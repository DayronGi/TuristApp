@extends('layouts.layout')
@section('content')
<h1 class="text-center">Planes turisticos</h1>
@foreach ($planes as $plan)
    <br>
    <div class="card">
        <div class="card-header">
            Plan Nro.{{ $plan->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Titulo: {{ $plan->titulo }}</h5>
            <p class="card-text">Descripcion: {{ $plan->descripcion }}</p>
            <p class="card-text"><small class="text-body-secondary">Duracion: {{ $plan->duracion_dias }} dias</small></p>
            <a href="#" class="btn btn-primary">Registrar</a>
        </div>
    </div>
    <br>
@endforeach
@endsection
