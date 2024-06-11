@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Plan Turístico</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('planes.update', $plan->planid) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="título" value="{{ $plan->título }}">
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripción">{{ $plan->descripción }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Días de duración</label>
                            <input type="text" class="form-control" name="duración" value="{{ $plan->duración }}">
                        </div>
                        <div class="form-group">
                            <label>Incluye desayuno</label>
                            <select class="form-control" name="incluyedesayuno">
                                <option value="TRUE" {{ $plan->incluyedesayuno == 'TRUE' ? 'selected' : '' }}>Si</option>
                                <option value="FALSE" {{ $plan->incluyedesayuno == 'FALSE' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Incluye almuerzo</label>
                            <select class="form-control" name="incluyealmuerzo">
                                <option value="TRUE" {{ $plan->incluyealmuerzo == 'TRUE' ? 'selected' : '' }}>Si</option>
                                <option value="FALSE" {{ $plan->incluyealmuerzo == 'FALSE' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Incluye cena</label>
                            <select class="form-control" name="incluyecena">
                                <option value="TRUE" {{ $plan->incluyecena == 'TRUE' ? 'selected' : '' }}>Si</option>
                                <option value="FALSE" {{ $plan->incluyecena == 'FALSE' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" name="estado">
                                <option value="Activo" {{ $plan->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ $plan->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="{{ route('planes.adm') }}" class="btn btn-secondary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection