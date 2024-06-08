<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use App\Models\Vendedor;
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
        return view('puntos.add', compact('puntos'));
    }

    public function store(Request $request)
    {
        $punto = new Punto();
        $punto->titulo = $request->titulo;
        $punto->descripcion = $request->descripcion;
        $punto->fecha_creacion = \Carbon\Carbon::now();
        $punto->id_estado = 1;
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
        $punto = Punto::findOrFail($id);
        return view('puntos.edit', compact('punto'));
    }

    public function update(Request $request, $id) {
        $punto = Punto::findOrFail($id);
        $punto->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_modificacion' => $request->input('fecha_modificacion'),
        ]);
        return redirect()->route('puntos.adm');
    }

    public function destroy($id)
    {
        $punto = Punto::findORFail($id);
        $punto->delete();
        return redirect()->route('puntos.adm');
    }
}