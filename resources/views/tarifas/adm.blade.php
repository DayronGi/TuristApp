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
                    <th class="text-center">Acciones</th>
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
                        <td class="text-center">
                            <a href="{{ route('tarifas.edit', $tarifa->tarifaid) }}" class="text-secondary mr-3"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('tarifas.delete', $tarifa->tarifaid) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    const confirmDelete = () => {
        return confirm('¿Estás seguro de que deseas eliminar esta tarifa?');
    }
</script>
@endsection