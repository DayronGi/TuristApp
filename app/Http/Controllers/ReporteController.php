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

            $compras = Compra::where('vendedorid', $vendedorid)
                ->whereMonth('fechacompra', date('m', strtotime($mes)))
                ->whereYear('fechacompra', date('Y', strtotime($mes)))
                ->get();

            return view('reportes.venta_mes', compact('vendedores', 'compras'));
        }

        return view('reportes.venta_mes', compact('vendedores'));
    }

    public function actividades_menos(Request $request)
    {
        $vendedores = Vendedor::all();
        $vendedorid = $request->input('vendedorid');
        $mes = $request->input('mes');
        $año = $request->input('año');

        $actividades = DB::table('detallecompra as d')
            ->join('compras as c', 'd.compraid', '=', 'c.compraid')
            ->join('planespuntosvisita as ppv', 'd.planid', '=', 'ppv.planid')
            ->join('puntosvisita as pv', 'ppv.puntoid', '=', 'pv.puntoid')
            ->select('pv.títuloactividad as actividad', DB::raw('COUNT(d.planid) as totalinclusiones'))
            ->where('c.vendedorid', $vendedorid)
            ->whereMonth('c.fechacompra', $mes)
            ->whereYear('c.fechacompra', $año)
            ->groupBy('pv.títuloactividad')
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
        $planes = DB::table('detallecompra')
            ->join('planesturisticos', 'detallecompra.planid', '=', 'planesturisticos.planid')
            ->join('compras', 'detallecompra.compraid', '=', 'compras.compraid')
            ->join('clientes', 'compras.clienteid', '=', 'clientes.clienteid')
            ->select('planesturisticos.título as Plan', 'clientes.nombre as Cliente', 'compras.fechacompra as FechaCompra')
            ->whereRaw('detallecompra.valordesayunoadicional > 0')
            ->orWhereRaw('detallecompra.valoralmuerzoadicional > 0')
            ->orWhereRaw('detallecompra.valorcenaadicional > 0')
            ->get();

        return view('reportes.planes_cargos', [
            'planes' => $planes
        ]);
    }

    public function planes_clientes(Request $request) 
    {
        $clientes = Cliente::all();
    
        if ($request->has('clienteid')) {
            $clienteid = $request->input('clienteid');
            $cliente = Cliente::where('clienteid', $clienteid)->first();
    
            if (!$cliente) {
                abort(404, 'Cliente no encontrado');
            }
    
            $compras = Compra::where('clienteid', $clienteid)->get();
    
            return view('reportes.planes_clientes', compact('clientes', 'compras'));
        }
    
        return view('reportes.planes_clientes', compact('clientes'));
    }    
}