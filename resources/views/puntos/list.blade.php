@extends('layouts.layout')
@section('content')
<h1 class="text-center">Puntos de visita</h1>
<br>
<div class="container">
    <div class="row">
        @foreach ($puntos as $punto)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Punto Nro.{{ $punto->puntoid }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Titulo: {{ $punto->títuloactividad }}</h5>
                        <p class="card-text">Descripcion: {{ $punto->descripciónactividad }}</p>
                        <p class="card-text">Lugar: {{ $punto->ciudad->ciudad }} - {{ $punto->departamento->departamento }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
