@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Tarifa</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('tarifas.update', $tarifa->tarifaid) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Tarifa Nro.</label>
                            <input type="text" class="form-control" name="tarifaid" value="{{ $tarifa->tarifaid }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Plan turístico</label>
                            <input type="text" class="form-control" name="planid" value="{{ $tarifa->plan->título }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Temporada</label>
                            <select class="form-control" name="temporada" required>
                                <option value="Alta" {{ $tarifa->temporada == 'Alta' ? 'selected' : '' }}>Alta</option>
                                <option value="Media" {{ $tarifa->temporada == 'Media' ? 'selected' : '' }}>Media</option>
                                <option value="Baja" {{ $tarifa->temporada == 'Baja' ? 'selected' : '' }}>Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="text" class="form-control" name="costo" value="{{ $tarifa->costo }}" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha inicio</label>
                            <input type="date" class="form-control" name="fechainicio" value="{{ $tarifa->fechainicio }}" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha fin</label>
                            <input type="date" class="form-control" name="fechafin" value="{{ $tarifa->fechafin }}" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{ route('tarifas.adm') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection