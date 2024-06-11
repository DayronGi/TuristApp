<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{

    public function redirectToPassword(Request $request, $section)
    {
        return redirect()->route('section.password', ['section' => $section]);
    }

    public function showPasswordForm()
    {
        return view('admin.password', ['redirect' => route('planes.adm')]);
    }

    public function checkPassword(Request $request)
    {
        if ($request->input('password') === 'adm123') {
            return redirect()->route($request->input('redirect'));
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }
}
