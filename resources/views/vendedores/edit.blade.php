@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('vendedores.update', $vendedor->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Documento">Documento</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $vendedor->id }}" readonly>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $vendedor->nombre }}" readonly>
    </div>
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="text" class="form-control" id="correo" name="correo" value="{{ $vendedor->correo }}">
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $vendedor->fecha_nacimiento }}" readonly>
    </div>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $vendedor->telefono }}">
    </div>
    <div class="form-group">
        <label for="username">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $vendedor->username }}" readonly>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ $vendedor->password }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('vendedores.list') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
