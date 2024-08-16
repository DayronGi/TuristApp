@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Agregar Tarifa</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('tarifas.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Plan turístico</label>
                            <select class="form-control" name="plan_id" required>
                                @foreach($planes as $plan)
                                    <option value="{{ $plan->plan_id }}">
                                        {{ $plan->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Temporada</label>
                            <select class="form-control" name="temporada" required>
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="text" class="form-control" name="costo" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha fin</label>
                            <input type="date" class="form-control" name="fecha_fin" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Agregar</button>
                            <a href="{{ route('tarifas.adm') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection