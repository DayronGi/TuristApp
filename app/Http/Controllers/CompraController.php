<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Compra;
use App\Models\CostoAdicionalAlimento;
use App\Models\DetalleCompra;
use App\Models\Plan;
use App\Models\Tarifa;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function list()
    {
        $compras = Compra::all();
        return view('compras.list', [
            'compras' => $compras
        ]);
    }

    public function add()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $planes = Plan::with('tarifas')->get();
        return view('compras.add', [
            'clientes' => $clientes,
            'vendedores' => $vendedores,
            'planes' => $planes,
        ]);
    }    
    
    public function store(Request $request)
    {
        $plan = Plan::findOrFail($request->planid);
    
        $costoDesayuno = 0;
        $costoAlmuerzo = 0;
        $costoCena = 0;
    
        if (!$plan->incluyedesayuno) {
            $costoDesayuno = CostoAdicionalAlimento::where('planid', $request->planid)->value('costodesayunoadicional');
        }
        if (!$plan->incluyealmuerzo) {
            $costoAlmuerzo = CostoAdicionalAlimento::where('planid', $request->planid)->value('costoalmuerzoadicional');
        }
        if (!$plan->incluyecena) {
            $costoCena = CostoAdicionalAlimento::where('planid', $request->planid)->value('costocenaadicional');
        }
    
        $costoAlimentos = $costoDesayuno + $costoAlmuerzo + $costoCena;
    
        $costoTotalPlan = $plan->tarifas()->where('temporada', $request->temporada)->first()->costo;
    
        $costoOtrosConceptos = $costoAlimentos;
        $totalCompra = ($costoTotalPlan + $costoOtrosConceptos) * $request->cantidadpersonas;
    
        $compra = new Compra();
        $compra->clienteid = $request->clienteid;
        $compra->vendedorid = $request->vendedorid;
        $compra->fechacompra = now();
        $compra->costototalplan = $costoTotalPlan;
        $compra->costootrosconceptos = $costoOtrosConceptos;
        $compra->totalcompra = $totalCompra;
        $compra->save();
    
        $detalle = new DetalleCompra();
        $detalle->compraid = $compra->compraid;
        $detalle->planid = $request->planid;
        $detalle->fechainicioviaje = $request->fechainicioviaje;
        $detalle->fechafinviaje = $request->fechafinviaje;
        $detalle->valortotalplan = $costoTotalPlan;
        $detalle->valordesayunoadicional = $costoDesayuno;
        $detalle->valoralmuerzoadicional = $costoAlmuerzo;
        $detalle->valorcenaadicional = $costoCena;
        $detalle->cantidadpersonas = $request->cantidadpersonas;
        $detalle->save();
    
        return redirect()->route('compras.list');
    }
}