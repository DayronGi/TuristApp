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
            <a href="{{ route('puntos.edit', $punto->id) }}" class="btn btn-secondary">Editar</a>
            <form action="{{ route('puntos.delete', $punto->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
    <br>
@endforeach
<script> const confirmDelete = () => { return confirm('¿Estás seguro de que deseas eliminar este punto?');} </script>
@endsection
