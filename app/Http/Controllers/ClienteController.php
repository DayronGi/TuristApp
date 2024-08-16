<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vendedor;
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
        $vendedores = Vendedor::all();
        return view('clientes.add', [
            'clientes' => $clientes,
            'vendedores' => $vendedores
        ]);
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->cliente_id = $request->cliente_id;
        $cliente->nombre = $request->nombre;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->correo = $request->correo;
        $cliente->telefono_1 = $request->telefono_1;
        $cliente->telefono_2 = $request->telefono_2;
        $cliente->vendedor_id = $request->vendedor_id;
        $cliente->save();
        return redirect()->route('clientes.list');
    }

    public function edit($id) {
        $cliente = Cliente::where('cliente_id', $id)->first();
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::where('cliente_id', $id)->first();
        $cliente->update([
            'correo' => $request->input('correo'),
            'telefono_1' => $request->input('telefono_1'),
            'telefono_2' => $request->input('telefono_2'),
        ]);
        return redirect()->route('clientes.list');
    }

    public function destroy($id)
    {
        $cliente = Cliente::where('cliente_id', $id)->first();
        $cliente->delete();
        return redirect()->route('clientes.list');
    }
}