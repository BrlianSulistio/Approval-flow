<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\NeedApproval;
use App\Models\needApproval_employee;
use App\Models\Transaction;
use App\Models\UserApproval;
use App\Models\WorkflowApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function halamanSettings()
    {
        return view('views.settings-page');
    }
    public function halamanApproval()
    {
        return view('views.approval-page');
    }
    public function formWorkFlow()
    {
        return view('views.form-workflow');
    }
    public function formEditWorkFlow($id)
    {
        $data = null;
        if ($id) {
            $data = WorkflowApproval::find($id);
        }

        return view('views.edit-form-workflow', compact('data'));
    }

    public function GetDataApproval(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->input('q');
            $data = Employee::where('nik', 'LIKE', "%{$query}%")->get();
        } else {
            $data = [];
        }
        return response()->json($data);
    }

    public function GetDataApprovalBy(Request $request)
    {
        $data = UserApproval::where('modul_id', $request->id)->get();
        return response()->json($data);
    }

    public function storeFormTransaction(Request $request)
    {
        $request->validate([
            'modul' => 'required',
            'amount' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            $modul = WorkflowApproval::find($request->modul);
            $needApproval = new NeedApproval();
            $transaction = new Transaction();
            $transaction->modul_id = $modul->id;
            $transaction->amount = $request->amount;
            $transaction->created_by = auth()->user()->nik;
            $transaction->save();

            switch ($modul->type) {
                case 'HRIS':
                    $needApproval->modul_id = $modul->id;
                    $needApproval->transaction_id = $transaction->id;
                    $needApproval->level = $modul->value;
                    $needApproval->save();
                    $needApproval_employee = new needApproval_employee();
                    $needApproval_employee->need_approval_id = $needApproval->id;
                    $needApproval_employee->nik = auth()->user()->nik;
                    $needApproval_employee->name = auth()->user()->name;
                    $needApproval_employee->email = auth()->user()->email;
                    $needApproval_employee->position = auth()->user()->position;
                    $needApproval_employee->save();
                    break;
                case 'Custom':
                    $needApproval->modul_id = $modul->id;
                    $needApproval->transaction_id = $transaction->id;
                    $needApproval->save();
                    $modul->userApproval()->each(function ($item) use ($needApproval) {
                        $needApproval_employee = new needApproval_employee();
                        $needApproval_employee->need_approval_id = $needApproval->id;
                        $needApproval_employee->nik = $item->nik;
                        $needApproval_employee->name = $item->name;
                        $needApproval_employee->email = $item->email;
                        $needApproval_employee->position = $item->position;
                        $needApproval_employee->save();
                    });
                    break;
                case 'Total Amount >=':
                case 'Total Amount >':
                case 'Total Amount <=':
                case 'Total Amount <':
                    $needApproval->modul_id = $modul->id;
                    $needApproval->transaction_id = $transaction->id;
                    $needApproval->level = $modul->value;
                    $needApproval->save();
                    break;
                default:
                    // Handle other cases if necessary
                    break;
            }

            DB::commit();
            return response()->json([
                'message' => 'Transaction saved successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Transaction failed to save',
                'error' => $e->getMessage(),
            ], 422);
        }
    }

    public function storeFormWorkFlow(Request $request)
    {
        $request->validate([
            'modul' => 'required',
            'type' => 'required',
            'value' => 'required_if:type,!Custom',
            'approval' => 'required_if:type,!HRIS',
        ]);
        // DD($request->all());
        try {
            DB::beginTransaction();
            if ($request->id) {
                $WorkflowApproval = WorkflowApproval::find($request->id);
                $WorkflowApproval->modul = $request->modul;
                $WorkflowApproval->type = $request->type;
                $WorkflowApproval->value = $request->value;
                $WorkflowApproval->save();
                UserApproval::where('modul_id', $request->id)->delete();
            } else {
                $WorkflowApproval = new WorkflowApproval();
                $WorkflowApproval->modul = $request->modul;
                $WorkflowApproval->type = $request->type;
                $WorkflowApproval->value = $request->value;
                $WorkflowApproval->save();
            }
            if ($request->has('approval')) {
                foreach ($request->approval as $value) {
                    $userApproval = new UserApproval();
                    $employee = Employee::where('nik', $value)->first();
                    $userApproval->modul_id = $WorkflowApproval->id;
                    $userApproval->nik = $employee->nik;
                    $userApproval->name = $employee->name;
                    $userApproval->email = $employee->email;
                    $userApproval->position = $employee->position;
                    $userApproval->save();
                }
            }
            DB::commit();
            return response()->json([
                'message' => 'Data saved successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Data failed to save',
            ], 422);
        }
    }

    public function GetDataWorkFlow()
    {
        $data = WorkflowApproval::query();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
    public function getDataModul()
    {
        $data = WorkflowApproval::all();

        return response()->json($data);
    }

    public function GetDataNeedsApproval()
    {
        $data = NeedApproval::with(['workflowApproval', 'needApprovalEmployees', 'transaction'])
            ->get();

        $data = $data->map(function ($item) {
            $item->approval_names = $item->needApprovalEmployees->pluck('name')->toArray();
            $item->transaction_amount = $item->transaction ? $item->transaction->amount : null;
            return $item;
        });

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }


    public function deleteWorkFlow(Request $request)
    {
        try {
            DB::beginTransaction();
            WorkflowApproval::find($request->id)->delete();
            UserApproval::where('modul_id', $request->id)->delete();
            DB::commit();
            return response()->json([
                'message' => 'Data deleted successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Data failed to delete',
            ], 422);
        }
    }
}
