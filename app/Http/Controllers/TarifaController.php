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
        $tarifa->planid = $request->planid;
        $tarifa->temporada = $request->temporada;
        $tarifa->costo = $request->costo;
        $tarifa->fechainicio = $request->fechainicio;
        $tarifa->fechafin = $request->fechafin;
        $tarifa->save();
        return redirect()->route('tarifas.list');
    }

    public function edit($id)
    {
        $tarifa = Tarifa::where('tarifaid', $id)->first();
        return view('tarifas.edit', [
            'tarifa' => $tarifa,
        ]);
    }


    public function update(Request $request, $id) {
        $tarifa = tarifa::where('tarifaid', $id)->first();
        $tarifa->update([
            'temporada' => $request->input('temporada'),
            'costo' => $request->input('costo'),
            'fechainicio' => $request->input('fechainicio'),
            'fechafin' => $request->input('fechafin'),
        ]);
        return redirect()->route('tarifas.adm');
    }

    public function destroy($id)
    {
        $tarifa = tarifa::where('tarifaid', $id)->first();
        $tarifa->delete();
        return redirect()->route('tarifas.adm');
    }
}