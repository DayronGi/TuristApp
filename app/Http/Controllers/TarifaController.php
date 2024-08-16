<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Tarifa;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    public function list()
    {
        $tarifas = Tarifa::all();
        return view('tarifas.list', [
            'tarifas' => $tarifas
        ]);
    }

    public function admin()
    {
        return view('tarifas.admin');
    }

    public function verify(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('tarifas.adm');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }

    }
    public function create()
    {
        return view('tarifas.create');
    }

    public function verify2(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('tarifas.add');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }

    public function adm()
    {
        $tarifas = Tarifa::all();
        return view('tarifas.adm', [
            'tarifas' => $tarifas
        ]);
    }

    public function add()
    {
        $tarifas = Tarifa::all();
        $planes = Plan::all();
        return view('tarifas.add', [
            'tarifas' => $tarifas,
            'planes' => $planes,
        ]);
    }

    public function store(Request $request)
    {
        $tarifa = new Tarifa();
        $tarifa->plan_id = $request->plan_id;
        $tarifa->temporada = $request->temporada;
        $tarifa->costo = $request->costo;
        $tarifa->fecha_inicio = $request->fecha_inicio;
        $tarifa->fecha_fin = $request->fecha_fin;
        $tarifa->save();
        return redirect()->route('tarifas.list');
    }

    public function edit($id)
    {
        $tarifa = Tarifa::where('tarifa_id', $id)->first();
        return view('tarifas.edit', [
            'tarifa' => $tarifa,
        ]);
    }


    public function update(Request $request, $id) {
        $tarifa = tarifa::where('tarifa_id', $id)->first();
        $tarifa->update([
            'temporada' => $request->input('temporada'),
            'costo' => $request->input('costo'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
        ]);
        return redirect()->route('tarifas.adm');
    }

    public function destroy($id)
    {
        $tarifa = tarifa::where('tarifa_id', $id)->first();
        $tarifa->delete();
        return redirect()->route('tarifas.adm');
    }
}