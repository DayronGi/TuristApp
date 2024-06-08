@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('vendedores.store') }}">
    @csrf
    <div class="form-group">
        <label for="Documento">Documento</label>
        <input type="text" class="form-control" id="id" name="id">
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="text" class="form-control" id="correo" name="correo">
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
    <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="text" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('vendedores.list') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection