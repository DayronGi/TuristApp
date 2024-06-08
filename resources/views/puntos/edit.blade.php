@extends('layouts.layout')
@section('content')
<form id="editForm" method="POST" action="{{ route('puntos.update', $punto->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $punto->titulo }}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{ $punto->descripcion }}</textarea>
    </div>
    <input type="hidden" name="fecha_modificacion" value="{{ now() }}">
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    <a href="{{ route('puntos.adm') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection