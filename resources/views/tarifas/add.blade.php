@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Agregar Tarifa</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('tarifas.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Plan turístico</label>
                            <select class="form-control" name="planid" required>
                                @foreach($planes as $plan)
                                    <option value="{{ $plan->planid }}">
                                        {{ $plan->título }}
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
                            <input type="date" class="form-control" name="fechainicio" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha fin</label>
                            <input type="date" class="form-control" name="fechafin" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <a href="{{ route('tarifas.adm') }}" class="btn btn-secondary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection