@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Reportes</h1>
    <br>

    <h2>Actividades Menos Incluidas</h2>
    <ul>
        @foreach($actividadesMenosIncluidas as $actividad)
            <li>{{ $actividad->actividad }} - Total: {{ $actividad->total }}</li>
        @endforeach
    </ul>

    <h2>Planes con Cargos Adicionales</h2>
    <ul>
        @foreach($planesConCargosAdicionales as $plan)
            <li>{{ $plan->titulo }}</li>
        @endforeach
    </ul>

    <h2>Planes Comprados por Cliente</h2>
    @foreach($planesComprados as $compra)
        <h3>Compra ID: {{ $compra->compraid }} - Fecha: {{ $compra->fechacompra }}</h3>
        <ul>
            <li>Plan: {{ $compra->plan->titulo }}</li>
            <li>Fecha Inicio Viaje: {{ $compra->fechainicioviaje }}</li>
            <li>Fecha Fin Viaje: {{ $compra->fechafinviaje }}</li>
            <li>Cantidad Personas: {{ $compra->cantidadpersonas }}</li>
        </ul>
    @endforeach

    <!-- Agrega aquí tus dos reportes adicionales -->

</div>
@endsection