@extends('layouts.layout')

@section('content')
<div class="container">
    <h2 class="text-center">Planes Turísticos con Cargos Adicionales</h2>
    @if(isset($planes) && count($planes) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-bordered mt-4">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Plan Turístico</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Fecha de Compra</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planes as $plan)
                    <tr>
                        <td class="text-center">{{ $plan->Plan }}</td>
                        <td class="text-center">{{ $plan->Cliente }}</td>
                        <td class="text-center">{{ $plan->FechaCompra }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center mt-4">No se encontraron planes turísticos con cargos adicionales.</p>
    @endif
</div>
@endsection