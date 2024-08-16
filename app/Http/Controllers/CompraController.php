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
            $costoDesayuno = CostoAdicionalAlimento::where('plan_id', $request->planid)->value('costo_desayuno_adicional');
        }
        if (!$plan->incluyealmuerzo) {
            $costoAlmuerzo = CostoAdicionalAlimento::where('plan_id', $request->planid)->value('costo_almuerzo_adicional');
        }
        if (!$plan->incluyecena) {
            $costoCena = CostoAdicionalAlimento::where('plan_id', $request->planid)->value('costo_cena_adicional');
        }

        $costoAlimentos = $costoDesayuno + $costoAlmuerzo + $costoCena;

        $costoTotalPlan = $plan->tarifas()->where('temporada', $request->temporada)->first()->costo;

        $costoOtrosConceptos = $costoAlimentos;
        $totalCompra = ($costoTotalPlan + $costoOtrosConceptos) * $request->cantidad_personas;

        $compra = new Compra();
        $compra->cliente_id = $request->cliente_id;
        $compra->vendedor_id = $request->vendedor_id;
        $compra->fecha_compra = now();
        $compra->costo_total_plan = $costoTotalPlan;
        $compra->costo_otros_conceptos = $costoOtrosConceptos;
        $compra->total_compra = $totalCompra;
        $compra->save();

        $detalle = new DetalleCompra();
        $detalle->compra_id = $compra->compra_id;
        $detalle->plan_id = $request->plan_id;
        $detalle->fecha_inicio_viaje = $request->fecha_inicio_viaje;
        $detalle->fecha_fin_viaje = $request->fecha_fin_viaje;
        $detalle->valor_total_plan = $costoTotalPlan;
        $detalle->valor_desayuno_adicional = $costoDesayuno;
        $detalle->valor_almuerzo_adicional = $costoAlmuerzo;
        $detalle->valor_cena_adicional = $costoCena;
        $detalle->cantidad_personas = $request->cantidad_personas;
        $detalle->save();

        return redirect()->route('compras.list');
    }
}