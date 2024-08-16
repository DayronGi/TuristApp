<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Plan;
use App\Models\PlanPunto;
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

    public function admin()
    {
        return view('puntos.admin');
    }

    public function verify(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('puntos.adm');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }

    public function create()
    {
        return view('puntos.create');
    }

    public function verify2(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('puntos.add');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }

    public function add()
    {
        $planes = Plan::all();
        $puntos = Punto::all();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        return view('puntos.add', [
            'puntos' => $puntos,
            'departamentos' => $departamentos,
            'ciudades' => $ciudades,
            'planes' => $planes,
        ]);
    }

    public function store(Request $request)
    {
        $punto = new Punto();
        $punto->titulo_actividad = $request->titulo_actividad;
        $punto->descripcion_actividad = $request->descripcion_actividad;
        $punto->estado = 'Activo';
        $punto->departamento_id = $request->departamento_id;
        $punto->ciudad_id = $request->ciudad_id;
        $punto->fecha_creacion = \Carbon\Carbon::now();
        $punto->save();

        $plan = new PlanPunto();
        $plan->plan_id = $request->plan_id;
        $plan->punto_id = $punto->punto_id;
        $plan->save();
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
        $punto = Punto::where('punto_id', $id)->first();
        return view('puntos.edit', compact('punto'));
    }

    public function update(Request $request, $id) {
        $punto = Punto::where('punto_id', $id)->first();
        $punto->update([
            'titulo_actividad' => $request->input('titulo_actividad'),
            'descripcion_actividad' => $request->input('descripcion_actividad'),
            'estado' => $request->input('estado'),
            'fecha_modificacion' => \Carbon\Carbon::now()
        ]);
        return redirect()->route('puntos.adm');
    }

    public function destroy($id)
    {
        $punto = Punto::where('punto_id', $id)->first();
        $punto->delete();
        return redirect()->route('puntos.adm');
    }
}