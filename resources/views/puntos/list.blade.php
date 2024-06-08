@extends('layouts.layout')
@section('content')
<h1 class="text-center">Puntos de visita</h1>
@foreach ($puntos as $punto)
    <br>
    <div class="card">
        <div class="card-header">
            Punto Nro.{{ $punto->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Titulo: {{ $punto->titulo }}</h5>
            <p class="card-text">Descripcion: {{ $punto->descripcion }}</p>
            <a href="#" class="btn btn-primary">Registrar</a>
        </div>
    </div>
    <br>
@endforeach
@endsection
