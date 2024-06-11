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
                        <a href="{{ route('puntos.edit', $punto->puntoid) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('puntos.delete', $punto->puntoid) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
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
