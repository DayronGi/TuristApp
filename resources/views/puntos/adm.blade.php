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
                        <h5 class="my-0">Punto Nro.{{ $punto->punto_id }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $punto->titulo_actividad }}</h5>
                        <p class="card-text">{{ $punto->descripcion_actividad }}</p>
                        <p class="card-text">Lugar: {{ $punto->ciudad->ciudad }} - {{ $punto->departamento->departamento }}</p>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('puntos.edit', $punto->punto_id) }}" class="text-secondary mr-2"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('puntos.delete', $punto->punto_id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    const confirmDelete = () => {
        return confirm('¿Estás seguro de que deseas eliminar este punto?');
    }
</script>
@endsection