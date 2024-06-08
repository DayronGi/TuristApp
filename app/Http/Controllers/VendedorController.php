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
        $vendedor->id = $request->id;
        $vendedor->nombre = $request->nombre;
        $vendedor->correo = $request->correo;
        $vendedor->fecha_nacimiento = $request->fecha_nacimiento;
        $vendedor->telefono = $request->telefono;
        $vendedor->username = $request->password;
        $vendedor->password = $request->password;
        $vendedor->save();
        return redirect()->route('vendedores.list');
    }

    public function edit($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(Request $request, $id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update([
            'correo' => $request->input('correo'),
            'telefono' => $request->input('telefono'),
            'password' => $request->input('password'),
        ]);
        return redirect()->route('vendedores.adm');
    }

    public function destroy($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();
        return redirect()->route('vendedores.adm');
    }
}