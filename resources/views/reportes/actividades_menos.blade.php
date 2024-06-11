@extends('layouts.layout')

@section('content')
<div class="container">
    <h2 class="text-center">Actividades Menos Incluidas</h2>
    <form action="{{ route('reportes.actividades_menos') }}" method="GET">
        <div class="form-group">
            <label for="vendedorid">Vendedor:</label>
            <select id="vendedorid" name="vendedorid" class="form-control" required>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor->vendedorid }}">{{ $vendedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="mes">Mes:</label>
            <select id="mes" name="mes" class="form-control" required>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="año">Año:</label>
            <select id="año" name="año" class="form-control" required>
                @foreach(range(date('Y') - 5, date('Y')) as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generar Reporte</button>
    </form>
    @if(isset($actividades) && count($actividades) > 0)
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Actividad</th>
                        <th class="text-center">Total Inclusiones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividades as $actividad)
                    <tr>
                        <td class="text-center">{{ $actividad->actividad }}</td>
                        <td class="text-center">{{ $actividad->totalinclusiones }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center mt-4">No se encontraron actividades para el período seleccionado.</p>
    @endif
</div>
@endsection