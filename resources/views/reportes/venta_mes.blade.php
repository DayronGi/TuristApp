@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Ventas por Mes</h1>
        <form action="{{ route('reportes.venta_mes') }}" method="GET">
            <div class="form-group">
                <label for="vendedor">Seleccione Vendedor:</label>
                <select class="form-control" id="vendedor" name="vendedor">
                    @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->vendedor_id }}">{{ $vendedor->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="mes">Seleccione Mes:</label>
                <input type="month" class="form-control" id="mes" name="mes">
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>
        <br>
        @if(isset($compras))
            <h2 class="text-center">Resultados del Reporte</h2>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Plan Turístico</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Teléfono 1</th>
                            <th class="text-center">Teléfono 2</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Fecha de Compra</th>
                            <th class="text-center">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compras as $compra)
                            <tr>
                                <td class="text-center">{{ $compra->detalle->plan->titulo }}</td>
                                <td class="text-center">{{ $compra->cliente->nombre }}</td>
                                <td class="text-center">{{ $compra->cliente->telefono_1 }}</td>
                                <td class="text-center">{{ $compra->cliente->telefono_2 }}</td>
                                <td class="text-center">{{ $compra->cliente->correo }}</td>
                                <td class="text-center">{{ $compra->fecha_compra }}</td>
                                <td class="text-center">{{ $compra->total_compra }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection