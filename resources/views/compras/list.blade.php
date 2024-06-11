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
                            <td class="text-center align-middle">{{ $compra->compraid }}</td>
                            <td class="text-center align-middle">{{ $compra->cliente->nombre }}</td>
                            <td class="text-center align-middle">{{ $compra->vendedor->nombre }}</td>
                            <td class="text-center align-middle">{{ $compra->fechacompra }}</td>
                            <td class="text-center align-middle">{{ $compra->costototalplan }}</td>
                            <td class="text-center align-middle">{{ $compra->costootrosconceptos }}</td>
                            <td class="text-center align-middle">{{ $compra->totalcompra }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection