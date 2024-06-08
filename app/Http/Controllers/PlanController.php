<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function list()
    {
        $planes = Plan::all();
        return view('planes.list', [
            'planes' => $planes
        ]);
    }

    public function adm()
    {
        $planes = Plan::all();
        return view('planes.adm', [
            'planes' => $planes
        ]);
    }

    public function add()
    {
        $planes = Plan::all();
        return view('planes.add', compact('planes'));
    }

    public function store(Request $request)
    {
        $plan = new Plan();
        $plan->titulo = $request->titulo;
        $plan->descripcion = $request->descripcion;
        $plan->fecha_creacion = \Carbon\Carbon::now();
        $plan->duracion_dias = $request->duracion_dias;
        $plan->id_alimentacion = 1;
        $plan->id_estado = 1;
        $plan->save();
        return redirect()->route('planes.list');
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('planes.edit', compact('plan'));
    }


    public function update(Request $request, $id) {
        $plan = Plan::findOrFail($id);
        $plan->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_modificacion' => \Carbon\Carbon::now()
        ]);
        return redirect()->route('planes.adm');
    }

    public function destroy($id)
    {
        $plan = Plan::findORFail($id);
        $plan->delete();
        return redirect()->route('planes.adm');
    }
}