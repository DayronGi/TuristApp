@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Compras</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Compra Nro.</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Vendedor</th>
                        <th class="text-center">Fecha compra</th>
                        <th class="text-center">Total plan</th>
                        <th class="text-center">Otros conceptos</th>
                        <th class="text-center">Total compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td class="text-center align-middle">{{ $compra->compra_id }}</td>
                            <td class="text-center align-middle">{{ $compra->cliente->nombre }}</td>
                            <td class="text-center align-middle">{{ $compra->vendedor->nombre }}</td>
                            <td class="text-center align-middle">{{ $compra->fecha_compra }}</td>
                            <td class="text-center align-middle">{{ $compra->costo_total_plan }}</td>
                            <td class="text-center align-middle">{{ $compra->costo_otros_conceptos }}</td>
                            <td class="text-center align-middle">{{ $compra->total_compra }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection