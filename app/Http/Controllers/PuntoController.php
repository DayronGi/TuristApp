<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Punto;
use Illuminate\Http\Request;

class PuntoController extends Controller
{
    public function list()
    {
        $puntos = Punto::all();
        return view('puntos.list', [
            'puntos' => $puntos
        ]);
    }

    public function add()
    {
        $puntos = Punto::all();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        return view('puntos.add', [
            'puntos' => $puntos,
            'departamentos' => $departamentos,
            'ciudades' => $ciudades
        ]);
    }

    public function store(Request $request)
    {
        $punto = new Punto();
        $punto->títuloactividad = $request->títuloactividad;
        $punto->descripciónactividad = $request->descripciónactividad;
        $punto->estado = 'Activo';
        $punto->departamentoid = $request->departamentoid;
        $punto->ciudadid = $request->ciudadid;
        $punto->fechacreación = \Carbon\Carbon::now();
        $punto->save();
        return redirect()->route('puntos.list');
    }


    public function adm()
    {
        $puntos = Punto::all();
        return view('puntos.adm', [
            'puntos' => $puntos
        ]);
    }

    public function edit($id)
    {
        $punto = Punto::where('puntoid', $id)->first();
        return view('puntos.edit', compact('punto'));
    }

    public function update(Request $request, $id) {
        $punto = Punto::where('puntoid', $id)->first();
        $punto->update([
            'títuloactividad' => $request->input('títuloactividad'),
            'descripciónactividad' => $request->input('descripciónactividad'),
            'estado' => $request->input('estado'),
            'fechamodificación' => \Carbon\Carbon::now()
        ]);
        return redirect()->route('puntos.adm');
    }

    public function destroy($id)
    {
        $punto = Punto::where('puntoid', $id)->first();
        $punto->delete();
        return redirect()->route('puntos.adm');
    }
}