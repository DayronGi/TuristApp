@extends('layouts.layout')
@section('content')
    <h1 class="text-center">Vendedores</h1>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de nacimiento</th>
                <th class="text-center">Documento</th>
                <th class="text-center">Telefono</th>
                <th class="text-center">Correo</th>
                <th></th>
            </tr>
        </thead>
        @foreach ($vendedores as $vendedor)
            <tbody>
                <tr>
                    <td class="text-center">{{ $vendedor->nombre }}</td>
                    <td class="text-center">{{ $vendedor->fecha_nacimiento }}</td>
                    <td class="text-center">{{ $vendedor->id }}</td>
                    <td class="text-center">{{ $vendedor->telefono }}</td>
                    <td class="text-center">{{ $vendedor->correo }}</td>
                    <td>
                        <a href="{{ route('vendedores.edit', $vendedor->id) }}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('vendedores.delete', $vendedor->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
<script> const confirmDelete = () => { return confirm('¿Estás seguro de que deseas eliminar este vendedor?');} </script>
@endsection