<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "message" => "Gagal Masuk, cek kembali badge dan password anda",
            ], 422);
        }
        $user = Employee::where('nik', $request->nik)->first();
        $credentials = $request->only('nik', 'password');

        if ($user) {
            if (Auth::guard('web')->attempt($credentials)) {
                return redirect()->route('dashboard');
            } else {
                return response()->json([
                    "message" => "Gagal Masuk, cek kembali badge dan password anda",
                ], 422);
            }
        }
        return response()->json([
            "message" => "Gagal Masuk, cek kembali badge dan password anda",
        ], 422);
    }
    public function logout()
    {
        Auth::logout();
        session()->forget('user');
        return redirect()->route('login');
    }
}
