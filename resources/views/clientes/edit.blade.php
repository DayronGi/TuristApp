@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Documento">Documento</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $cliente->id }}" readonly>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}" readonly>
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $cliente->fecha_nacimiento }}" readonly>
    </div>
    <div class="form-group">
        <label for="telefono_1">Telefono 1</label>
        <input type="text" class="form-control" id="telefono_1" name="telefono_1" value="{{ $cliente->telefono_1 }}" required>
    </div>
    <div class="form-group">
        <label for="telefono_2">Telefono 2</label>
        <input type="text" class="form-control" id="telefono_2" name="telefono_2" value="{{ $cliente->telefono_2 }}">
    </div>
    <div class="form-group">
        <label for="correo">Correo</label>
        <input type="text" class="form-control" id="correo" name="correo" value="{{ $cliente->correo }}" required>
    </div>
    <div class="form-group">
        <label for="id_vendedor">Documento vendedor</label>
        <input type="text" class="form-control" id="id_vendedor" name="id_vendedor" value="{{ $cliente->id_vendedor }}" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('clientes.list') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
