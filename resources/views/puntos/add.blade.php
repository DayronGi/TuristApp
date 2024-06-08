@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('puntos.store') }}">
    @csrf
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
    <a href="{{ route('puntos.list') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
