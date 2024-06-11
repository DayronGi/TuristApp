@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Editar Compra</h1>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('compras.update', $compra->compraid) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Compra Nro.</label>
                            <input type="text" class="form-control" name="compraid" value="{{ $compra->compraid }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="text" class="form-control" name="clienteid" value="{{ $compra->cliente->nombre }}" required>
                        </div>
                        <div class="form-group">
                            <label>Vendedor</label>
                            <input type="text" class="form-control" name="vendedorid" value="{{ $compra->vendedor->nombre }}" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha compra</label>
                            <input type="date" class="form-control" name="fechacompra" value="{{ $compra->fechacompra }}" required>
                        </div>
                        <div class="form-group">
                            <label>Total plan</label>
                            <input type="text" class="form-control" name="costototalplan" value="{{ $compra->costototalplan }}" required>
                        </div>
                        <div class="form-group">
                            <label>Otros conceptos</label>
                            <input type="text" class="form-control" name="costootrosconceptos" value="{{ $compra->costootrosconceptos }}" required>
                        </div>
                        <div class="form-group">
                            <label>Total compra</label>
                            <input type="text" class="form-control" name="totalcompra" value="{{ $compra->totalcompra }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('compras.list') }}" class="btn btn-secondary">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection