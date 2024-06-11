@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Puntos de Visita</h1>
    <br>
    <div class="row">
        @foreach ($puntos as $punto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="my-0">Punto Nro.{{ $punto->puntoid }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $punto->títuloactividad }}</h5>
                        <p class="card-text">{{ $punto->descripciónactividad }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lugar: {{ $punto->ciudad->ciudad }} - {{ $punto->departamento->departamento }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection