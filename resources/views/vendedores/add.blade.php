@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Agregar Vendedor</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('vendedores.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="documento">Documento</label>
                            <input type="text" class="form-control" id="documento" name="vendedorid" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="fechanacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" required>
                        </div>
                        <div class="form-group">
                            <label for="teléfono">Teléfono</label>
                            <input type="text" class="form-control" id="teléfono" name="teléfono" required>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="text" class="form-control" id="contraseña" name="contraseña" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Crear</button>
                            <a href="{{ route('vendedores.list') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection