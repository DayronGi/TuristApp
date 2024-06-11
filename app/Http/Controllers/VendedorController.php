<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{

    public function list()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.list', [
            'vendedores' => $vendedores
        ]);
    }

    public function admin()
    {
        return view('vendedores.admin');
    }

    public function verify(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('vendedores.adm');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function verify2(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('vendedores.add');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }    
    
    public function adm()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.adm', [
            'vendedores' => $vendedores
        ]);
    }

    public function add()
    {
        $vendedores = Vendedor::all();
        return view('vendedores.add', compact('vendedores'));
    }

    public function store(Request $request)
    {
        $vendedor = new Vendedor();
        $vendedor->vendedorid = $request->vendedorid;
        $vendedor->nombre = $request->nombre;
        $vendedor->correo = $request->correo;
        $vendedor->fechanacimiento = $request->fechanacimiento;
        $vendedor->teléfono = $request->teléfono;
        $vendedor->usuario = $request->usuario;
        $vendedor->contraseña = $request->contraseña;
        $vendedor->save();
        return redirect()->route('vendedores.list');
    }

    public function edit($id)
    {
        $vendedor = Vendedor::where('vendedorid', $id)->first();
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request, $id)
    {
        $vendedor = Vendedor::where('vendedorid', $id)->first();
        $vendedor->update([
            'correo' => $request->input('correo'),
            'teléfono' => $request->input('telefono'),
            'contraseña' => $request->input('contraseña'),
        ]);
        return redirect()->route('vendedores.adm');
    }

    public function destroy($id)
    {
        $vendedor = Vendedor::where('vendedorid', $id)->first();
        $vendedor->delete();
        return redirect()->route('vendedores.adm');
    }
}