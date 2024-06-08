@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('clientes.store') }}">
    @csrf
    <div class="form-group">
        <label for="Documento">Documento</label>
        <input type="text" class="form-control" id="id" name="id" required>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
    </div>
    <div class="form-group">
        <label for="telefono_1">Telefono 1</label>
        <input type="text" class="form-control" id="telefono_1" name="telefono_1" required>
    </div>
    <div class="form-group">
        <label for="telefono_2">Telefono 2</label>
        <input type="text" class="form-control" id="telefono_2" name="telefono_2">
    </div>
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="text" class="form-control" id="correo" name="correo" required>
    </div>
    <div class="form-group">
        <label for="id_vendedor">Documento vendedor</label>
        <input type="text" class="form-control" id="id_vendedor" name="id_vendedor" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('clientes.list') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
