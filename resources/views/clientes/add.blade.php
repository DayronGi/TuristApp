@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Añadir Cliente</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Documento</label>
                            <input type="text" class="form-control" name="clienteid" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fechanacimiento" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono 1</label>
                            <input type="text" class="form-control" name="teléfono1" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono 2</label>
                            <input type="text" class="form-control" name="teléfono2">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label>Documento Vendedor</label>
                            <select class="form-control" name="vendedorid" required>
                                <option value="">Selecciona un vendedor</option>
                                @foreach($vendedores as $vendedor)
                                    <option value="{{ $vendedor->vendedorid }}">{{ $vendedor->vendedorid }} - {{ $vendedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="{{ route('clientes.list') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection