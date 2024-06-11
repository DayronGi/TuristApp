@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Vendedor</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('vendedores.update', $vendedor->vendedorid) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Documento">Documento</label>
                            <input type="text" class="form-control" name="vendedorid" value="{{ $vendedor->vendedorid }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $vendedor->nombre }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" name="correo" value="{{ $vendedor->correo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fechanacimiento" value="{{ $vendedor->fechanacimiento }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="teléfono" value="{{ $vendedor->teléfono }}" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" name="usuario" value="{{ $vendedor->usuario }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" class="form-control" name="contraseña" value="{{ $vendedor->contraseña }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('vendedores.adm') }}" class="btn btn-secondary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection