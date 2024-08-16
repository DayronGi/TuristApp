@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Planes Turísticos</h1>
    <br>
    <div class="row">
        @foreach ($planes as $plan)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="my-0">Plan Nro.{{ $plan->plan_id }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $plan->titulo }}</h5>
                        <p class="card-text">{{ $plan->descripcion }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Duración: {{ $plan->duracion }} días</li>
                            <li class="list-group-item">Incluye Desayuno: {{ $plan->incluye_desayuno == '1' ? 'Sí' : 'No' }}</li>
                            <li class="list-group-item">Incluye Almuerzo: {{ $plan->incluye_almuerzo == '1' ? 'Sí' : 'No' }}</li>
                            <li class="list-group-item">Incluye Cena: {{ $plan->incluye_cena == '1' ? 'Sí' : 'No' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection