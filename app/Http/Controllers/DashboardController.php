<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('views.home');
    }

    public function formTransaksi()
    {
        return view('views.form-transaksi');
    }

    public function GetDataTransaksi()
    {
        if (auth()->user()->role === 'admin') {
            $data = Transaction::join('workflow_approvals', 'transactions.modul_id', '=', 'workflow_approvals.id')->get();
        } else {
            $data = Transaction::join('workflow_approvals', 'transactions.modul_id', '=', 'workflow_approvals.id')->where('transactions.created_by',  auth()->user()->nik)->get();
        }
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
