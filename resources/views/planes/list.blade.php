@extends('layouts.layout')
@section('content')
<h1 class="text-center">Planes turísticos</h1>
<br>
<div class="container">
    <div class="row">
        @foreach ($planes as $plan)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Plan Nro.{{ $plan->planid }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Título: {{ $plan->título }}</h5>
                        <p class="card-text">Descripción: {{ $plan->descripción }}</p>
                        <p class="card-text">Duración: {{ $plan->duración }} días</p>
                        <p class="card-text">Incluye Desayuno: {{ $plan->incluyedesayuno == 'true' ? 'Sí' : 'No' }}</p>
                        <p class="card-text">Incluye Almuerzo: {{ $plan->incluyealmuerzo == 'true' ? 'Sí' : 'No' }}</p>
                        <p class="card-text">Incluye Cena: {{ $plan->incluyecena == 'true' ? 'Sí' : 'No' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
