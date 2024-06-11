@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2 class="text-center">Consulta de Planes por Cliente</h2>
        <br>
        <form action="{{ route('reportes.planes_clientes') }}" method="GET">
            <div class="form-group">
                <label for="clienteid">Documento:</label>
                <input type="number" id="clienteid" name="clienteid" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
        <br>
        @if (isset($compras) && count($compras) > 0)
            <h3 class="text-center">Planes Comprados por el Cliente:</h3>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Compra Nro.</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Plan turístico</th>
                            <th class="text-center">Fecha de compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                            <tr>
                                <td class="text-center">{{ $compra->compraid }}</td>
                                <td class="text-center">{{ $compra->cliente->nombre }}</td>
                                <td class="text-center">{{ $compra->detalle->plan->título }}</td>
                                <td class="text-center">{{ $compra->fechacompra }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center">No se encontraron planes comprados por el cliente.</p>
        @endif
    </div>
@endsection