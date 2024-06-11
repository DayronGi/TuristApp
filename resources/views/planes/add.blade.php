@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Agregar Nuevo Plan</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{ route('planes.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="título" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripción" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="duracion">Días de duración</label>
                            <input type="number" class="form-control" id="duracion" name="duración" required>
                        </div>
                        <div class="form-group">
                            <label for="incluyedesayuno">Incluye desayuno</label>
                            <select class="form-control" id="incluyedesayuno" name="incluyedesayuno" required>
                                <option value="TRUE">Si</option>
                                <option value="FALSE">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="incluyealmuerzo">Incluye almuerzo</label>
                            <select class="form-control" id="incluyealmuerzo" name="incluyealmuerzo" required>
                                <option value="TRUE">Si</option>
                                <option value="FALSE">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="incluyecena">Incluye cena</label>
                            <select class="form-control" id="incluyecena" name="incluyecena" required>
                                <option value="TRUE">Si</option>
                                <option value="FALSE">No</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary mr-2">Crear</button>
                            <a href="{{ route('planes.list') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection