@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Punto de Visita</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form id="editForm" method="POST" action="{{ route('puntos.update', $punto->punto_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="titulo_actividad" value="{{ $punto->titulo_actividad }}" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion_actividad" required>{{ $punto->descripcion_actividad }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Lugar</label>
                            <input type="text" class="form-control" value="{{ $punto->ciudad->ciudad }} - {{ $punto->departamento->departamento }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="estado">
                                <option value="Activo" {{ $punto->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ $punto->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                            <a href="{{ route('puntos.adm') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection