@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Plan Turístico</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('planes.update', $plan->plan_id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="titulo" value="{{ $plan->titulo }}">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion">{{ $plan->descripcion }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Días de duración</label>
                            <input type="text" class="form-control" name="duracion" value="{{ $plan->duracion }}">
                        </div>
                        <div class="form-group">
                            <label>Incluye desayuno</label>
                            <select class="form-control" name="incluye_desayuno">
                                <option value="TRUE" {{ $plan->incluye_desayuno == 'TRUE' ? 'selected' : '' }}>Si</option>
                                <option value="FALSE" {{ $plan->incluye_desayuno == 'FALSE' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Incluye almuerzo</label>
                            <select class="form-control" name="incluye_almuerzo">
                                <option value="TRUE" {{ $plan->incluye_almuerzo == 'TRUE' ? 'selected' : '' }}>Si</option>
                                <option value="FALSE" {{ $plan->incluye_almuerzo == 'FALSE' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Incluye cena</label>
                            <select class="form-control" name="incluye_cena">
                                <option value="TRUE" {{ $plan->incluye_cena == 'TRUE' ? 'selected' : '' }}>Si</option>
                                <option value="FALSE" {{ $plan->incluye_cena == 'FALSE' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="estado">
                                <option value="Activo" {{ $plan->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ $plan->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                            <a href="{{ route('planes.adm') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection