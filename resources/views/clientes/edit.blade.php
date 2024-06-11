@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Cliente</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.update', $cliente->clienteid) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Documento</label>
                            <input type="text" class="form-control" name="clienteid" value="{{ $cliente->clienteid }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $cliente->nombre }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fechanacimiento" value="{{ $cliente->fechanacimiento }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefono_1">Teléfono 1</label>
                            <input type="text" class="form-control" name="teléfono1" value="{{ $cliente->teléfono1 }}" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono_2">Teléfono 2</label>
                            <input type="text" class="form-control" name="teléfono2" value="{{ $cliente->teléfono2 }}">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" value="{{ $cliente->correo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_vendedor">Documento Vendedor</label>
                            <input type="text" class="form-control" name="vendedorid" value="{{ $cliente->vendedorid }}" readonly>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{ route('clientes.list') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection