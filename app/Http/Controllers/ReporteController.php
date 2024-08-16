<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Vendedor;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function venta_mes(Request $request)
    {
        $vendedores = Vendedor::all();

        if ($request->has(['vendedor', 'mes'])) {
            $vendedorid = $request->input('vendedor');
            $mes = $request->input('mes');

            $compras = Compra::where('vendedor_id', $vendedorid)
                ->whereMonth('fecha_compra', date('m', strtotime($mes)))
                ->whereYear('fecha_compra', date('Y', strtotime($mes)))
                ->get();

            return view('reportes.venta_mes', compact('vendedores', 'compras'));
        }

        return view('reportes.venta_mes', compact('vendedores'));
    }

    public function actividades_menos(Request $request)
    {
        $vendedores = Vendedor::all();
        $vendedorid = $request->input('vendedor_id');
        $mes = $request->input('mes');
        $año = $request->input('año');

        $actividades = DB::table('detalle_compra as d')
            ->join('compras as c', 'd.compra_id', '=', 'c.compra_id')
            ->join('planes_puntos_visita as ppv', 'd.plan_id', '=', 'ppv.plan_id')
            ->join('puntos_visita as pv', 'ppv.punto_id', '=', 'pv.punto_id')
            ->select('pv.titulo_actividad as actividad', DB::raw('COUNT(d.plan_id) as totalinclusiones'))
            ->where('c.vendedor_id', $vendedorid)
            ->whereMonth('c.fecha_compra', $mes)
            ->whereYear('c.fecha_compra', $año)
            ->groupBy('pv.titulo_actividad')
            ->orderBy('totalinclusiones', 'asc')
            ->limit(10)
            ->get();

        return view('reportes.actividades_menos', [
            'actividades' => $actividades,
            'vendedores' => $vendedores,
        ]);
    }

    public function planes_cargos()
    {
        $planes = DB::table('detalle_compra')
            ->join('planes_turisticos', 'detalle_compra.plan_id', '=', 'planes_turisticos.plan_id')
            ->join('compras', 'detalle_compra.compra_id', '=', 'compras.compra_id')
            ->join('clientes', 'compras.cliente_id', '=', 'clientes.cliente_id')
            ->select('planes_turisticos.titulo as Plan', 'clientes.nombre as Cliente', 'compras.fecha_compra as FechaCompra')
            ->whereRaw('detalle_compra.valor_desayuno_adicional > 0')
            ->orWhereRaw('detalle_compra.valor_almuerzo_adicional > 0')
            ->orWhereRaw('detalle_compra.valor_cena_adicional > 0')
            ->get();

        return view('reportes.planes_cargos', [
            'planes' => $planes
        ]);
    }

    public function planes_clientes(Request $request)
    {
        $clientes = Cliente::all();

        if ($request->has('cliente_id')) {
            $clienteid = $request->input('cliente_id');
            $cliente = Cliente::where('cliente_id', $clienteid)->first();

            if (!$cliente) {
                abort(404, 'Cliente no encontrado');
            }

            $compras = Compra::where('cliente_id', $clienteid)->get();

            return view('reportes.planes_clientes', compact('clientes', 'compras'));
        }

        return view('reportes.planes_clientes', compact('clientes'));
    }
}