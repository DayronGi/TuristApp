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
        $plan->título = $request->título;
        $plan->descripción = $request->descripción;
        $plan->duración = $request->duración;
        $plan->incluyedesayuno = $request->incluyedesayuno;
        $plan->incluyealmuerzo = $request->incluyealmuerzo;
        $plan->incluyecena = $request->incluyecena;
        $plan->estado = 'Activo';
        $plan->fechacreación = \Carbon\Carbon::now();
        $plan->save();
        return redirect()->route('planes.list');
    }

    public function edit($id)
    {
        $plan = Plan::where('planid', $id)->first();
        return view('planes.edit', compact('plan'));
    }


    public function update(Request $request, $id)
    {
        $plan = Plan::where('planid', $id)->first();
        $plan->update([
            'título' => $request->input('título'),
            'descripción' => $request->input('descripción'),
            'duración' => $request->input('duración'),
            'incluyedesayuno' => $request->input('incluyedesayuno'),
            'incluyealmuerzo' => $request->input('incluyealmuerzo'),
            'incluyecena' => $request->input('incluyecena'),
            'estado' => $request->input('estado'),
            'fechamodificación' => \Carbon\Carbon::now()
        ]);
        return redirect()->route('planes.adm');
    }

    public function destroy($id)
    {
        $plan = Plan::where('planid', $id)->first();
        $plan->delete();
        return redirect()->route('planes.adm');
    }
}