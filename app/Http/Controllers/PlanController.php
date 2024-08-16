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

    public function admin()
    {
        return view('planes.admin');
    }

    public function verify(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('planes.adm');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }

    public function create()
    {
        return view('planes.create');
    }

    public function verify2(Request $request)
    {
        if ($request->password === 'admin123') {
            return redirect()->route('planes.add');
        } else {
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
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
        $plan->duracion = $request->duracion;
        $plan->incluye_desayuno = $request->incluye_desayuno;
        $plan->incluye_almuerzo = $request->incluye_almuerzo;
        $plan->incluye_cena = $request->incluye_cena;
        $plan->estado = 'Activo';
        $plan->fechacreacion = \Carbon\Carbon::now();
        $plan->save();
        return redirect()->route('planes.list');
    }

    public function edit($id)
    {
        $plan = Plan::where('plan_id', $id)->first();
        return view('planes.edit', compact('plan'));
    }


    public function update(Request $request, $id)
    {
        $plan = Plan::where('plan_id', $id)->first();
        $plan->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'duracion' => $request->input('duracion'),
            'incluye_desayuno' => $request->input('incluye_desayuno'),
            'incluye_almuerzo' => $request->input('incluye_almuerzo'),
            'incluye_cena' => $request->input('incluye_cena'),
            'estado' => $request->input('estado'),
            'fecha_modificacion' => \Carbon\Carbon::now()
        ]);
        return redirect()->route('planes.adm');
    }

    public function destroy($id)
    {
        $plan = Plan::where('plan_id', $id)->first();
        $plan->delete();
        return redirect()->route('planes.adm');
    }
}