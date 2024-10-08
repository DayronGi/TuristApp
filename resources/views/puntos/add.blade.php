@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Agregar Nuevo Punto de Visita</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <form method="POST" action="{{ route('puntos.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="titulo_actividad" required>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <textarea class="form-control" name="descripcion_actividad" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ciudad</label>
                                <select class="form-control" id="ciudad" name="ciudad_id" required>
                                    <option value="">Selecciona una ciudad</option>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->ciudad_id }}"
                                            data-departamento="{{ $ciudad->departamento_id }}">{{ $ciudad->ciudad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Plan turístico</label>
                                <select class="form-control" name="plan_id">
                                    @foreach ($planes as $plan)
                                        <option value="{{ $plan->plan_id }}">{{ $plan->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" id="departamento" name="departamento_id">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="estado" required>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary mr-2">Crear</button>
                                <a href="{{ route('puntos.list') }}" class="btn btn-secondary">Volver</a>
                            </div>
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
