<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    // En tu controlador de reportes

public function reportes()
{
    // 8) Listado de las actividades menos incluidas en los planes turísticos vendidos por un vendedor en un mes específico.
    $actividadesMenosIncluidas = DB::table('detallecompra')
        ->join('planesturisticos', 'detallecompra.planid', '=', 'planesturisticos.planid')
        ->select('planesturisticos.título', DB::raw('COUNT(*) as total'))
        ->groupBy('planesturisticos.título')
        ->orderBy('total')
        ->limit(10)
        ->get();

    // 9) Listado de planes turísticos vendidos con cargos adicionales que no están en el paquete.
    $planesConCargosAdicionales = DB::table('detallecompra')
        ->join('planesturisticos', 'detallecompra.planid', '=', 'planesturisticos.planid')
        ->where('detallecompra.valordesayunoadicional', '>', 0)
        ->orWhere('detallecompra.valoralmuerzoadicional', '>', 0)
        ->orWhere('detallecompra.valorcenaadicional', '>', 0)
        ->select('planesturisticos.título')
        ->distinct()
        ->get();

    // 10) Para un cliente en particular (por número de cédula), qué planes compró y en qué fecha.
    $cliente = Cliente::where('clienteid', '1')->first();
    $planesComprados = $cliente->compras()->with('planesturisticos')->get();

    // 11) Dos reportes adicionales que considere necesarios.

    return view('reportes', [
        'actividadesMenosIncluidas' => $actividadesMenosIncluidas,
        'planesConCargosAdicionales' => $planesConCargosAdicionales,
        'planesComprados' => $planesComprados,
    ]);
}

}
