@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('planes.store') }}">
    @csrf
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
    </div>
    <div class="form-group">
      <label for="duracion_dias">Dias de duracion</label>
      <input type="text" class="form-control" id="duracion_dias" name="duracion_dias">
  </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('planes.list') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
