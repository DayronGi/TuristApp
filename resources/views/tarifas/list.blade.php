@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Tarifas</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Tarifa Nro.</th>
                    <th class="text-center">Plan turístico</th>
                    <th class="text-center">Temporada</th>
                    <th class="text-center">Costo</th>
                    <th class="text-center">Fecha inicio</th>
                    <th class="text-center">Fecha fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarifas as $tarifa)
                    <tr>
                        <td class="text-center">{{ $tarifa->tarifaid }}</td>
                        <td class="text-center">{{ $tarifa->plan->título }}</td>
                        <td class="text-center">{{ $tarifa->temporada }}</td>
                        <td class="text-center">{{ $tarifa->costo }}</td>
                        <td class="text-center">{{ $tarifa->fechainicio }}</td>
                        <td class="text-center">{{ $tarifa->fechafin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection