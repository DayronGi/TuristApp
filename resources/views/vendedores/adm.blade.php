@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Vendedores</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Fecha de nacimiento</th>
                    <th class="text-center">Documento</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendedores as $vendedor)
                    <tr>
                        <td class="text-center">{{ $vendedor->nombre }}</td>
                        <td class="text-center">{{ $vendedor->fecha_nacimiento }}</td>
                        <td class="text-center">{{ $vendedor->vendedor_id }}</td>
                        <td class="text-center">{{ $vendedor->telefono }}</td>
                        <td class="text-center">{{ $vendedor->correo }}</td>
                        <td class="text-center">
                            <a href="{{ route('vendedores.edit', $vendedor->vendedor_id) }}" class="text-secondary mr-3"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('vendedores.delete', $vendedor->vendedor_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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
        return confirm('¿Estás seguro de que deseas eliminar este vendedor?');
    }
</script>
@endsection