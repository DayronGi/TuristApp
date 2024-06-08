@extends('layouts.layout')
@section('content')
<form method="POST" action="{{ route('planes.update', $plan->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $plan->titulo }}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{ $plan->descripcion }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    <a href="{{ route('planes.adm') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
