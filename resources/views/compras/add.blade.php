@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Agregar Compra</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('compras.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control" name="clienteid" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->clienteid }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vendedor</label>
                            <select class="form-control" name="vendedorid" required>
                                @foreach($vendedores as $vendedor)
                                    <option value="{{ $vendedor->vendedorid }}">{{ $vendedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Plan Turístico</label>
                            <select class="form-control" name="planid" required>
                                @foreach($planes as $plan)
                                    <option value="{{ $plan->planid }}">{{ $plan->título }}</option>
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
                            <label>Fecha inicio del viaje</label>
                            <input type="date" class="form-control" name="fechainicioviaje" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha fin del viaje</label>
                            <input type="date" class="form-control" name="fechafinviaje" required>
                        </div>
                        <div class="form-group">
                            <label>Cantidad de Personas</label>
                            <input type="number" class="form-control" name="cantidadpersonas" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="{{ route('compras.list') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection