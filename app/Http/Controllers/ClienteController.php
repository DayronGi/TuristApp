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
        $cliente->clienteid = $request->clienteid;
        $cliente->nombre = $request->nombre;
        $cliente->fechanacimiento = $request->fechanacimiento;
        $cliente->correo = $request->correo;
        $cliente->teléfono1 = $request->teléfono1;
        $cliente->teléfono2 = $request->teléfono2;
        $cliente->vendedorid = $request->vendedorid;
        $cliente->save();
        return redirect()->route('clientes.list');
    }

    public function edit($id) {
        $cliente = Cliente::where('clienteid', $id)->first();
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::where('clienteid', $id)->first();
        $cliente->update([
            'correo' => $request->input('correo'),
            'teléfono1' => $request->input('teléfono1'),
            'teléfono2' => $request->input('teléfono2'),
        ]);
        return redirect()->route('clientes.list');
    }

    public function destroy($id)
    {
        $cliente = Cliente::where('clienteid', $id)->first();
        $cliente->delete();
        return redirect()->route('clientes.list');
    }
}