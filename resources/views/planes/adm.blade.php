@extends('layouts.layout')
@section('content')
<h1 class="text-center">Planes turísticos</h1>
@foreach ($planes as $plan)
    <br>
    <div class="card">
        <div class="card-header">
            Plan Nro.{{ $plan->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Título: {{ $plan->titulo }}</h5>
            <p class="card-text">Descripción: {{ $plan->descripcion }}</p>
            <p class="card-text"><small class="text-body-secondary">Duración: {{ $plan->duracion_dias }} días</small></p>
            <a href="{{ route('planes.edit', $plan->id) }}" class="btn btn-secondary">Editar</a>

            <form action="{{ route('planes.delete', $plan->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <br>
@endforeach
<script> const confirmDelete = () => { return confirm('¿Estás seguro de que deseas eliminar este plan?');} </script>
@endsection
