<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $vendedor = DB::table('vendedores')->where('username', $username)->where('password', $password)->first();

        if ($vendedor) {
            return redirect()->route('planes.list');
        } else {
            return redirect()->back()->withErrors(['username' => 'Credenciales incorrectas'])->withInput();
        }
    }
}