@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Agregar Nuevo Punto de Visita</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('puntos.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="títuloactividad" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripciónactividad" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ciudad</label>
                            <select class="form-control" id="ciudad" name="ciudadid" required>
                                <option value="">Selecciona una ciudad</option>
                                @foreach($ciudades as $ciudad)
                                    <option value="{{ $ciudad->ciudadid }}" data-departamento="{{ $ciudad->departamentoid }}">{{ $ciudad->ciudad }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="departamento" name="departamentoid">
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="estado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <a href="{{ route('puntos.list') }}" class="btn btn-secondary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ciudadSelect = document.getElementById('ciudad');
        var departamentoInput = document.getElementById('departamento');
        
        ciudadSelect.addEventListener('change', function() {
            var selectedCiudad = ciudadSelect.options[ciudadSelect.selectedIndex];
            var departamentoId = selectedCiudad.getAttribute('data-departamento');
            departamentoInput.value = departamentoId;
        });
    });
</script>
@endsection