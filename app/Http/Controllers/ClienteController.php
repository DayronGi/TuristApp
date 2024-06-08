<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function list()
    {
        $clientes = Cliente::all();
        return view('clientes.list', [
            'clientes' => $clientes
        ]);
    }

    public function add()
    {
        $clientes = Cliente::all();
        return view('clientes.add', compact('clientes'));
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->id = $request->id;
        $cliente->nombre = $request->nombre;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->correo = $request->correo;
        $cliente->telefono_1 = $request->telefono_1;
        $cliente->telefono_2 = $request->telefono_2;
        $cliente->id_vendedor = $request->id_vendedor;
        $cliente->save();
        return redirect()->route('clientes.list');
    }

    public function edit($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'correo' => $request->input('correo'),
            'telefono_1' => $request->input('telefono_1'),
            'telefono_2' => $request->input('telefono_2'),
        ]);
        return redirect()->route('clientes.list');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.list');
    }
}