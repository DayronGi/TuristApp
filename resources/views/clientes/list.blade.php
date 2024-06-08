@extends('layouts.layout')
@section('content')
    <h1 class="text-center">Clientes</h1>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de nacimiento</th>
                <th class="text-center">Cedula</th>
                <th class="text-center">Correo</th>
                <th class="text-center text-nowrap">Telefono 1</th>
                <th class="text-center text-nowrap">Telefono 2</th>
                <th></th>
            </tr>
        </thead>
        @foreach ($clientes as $cliente)
            <tbody>
                <tr>
                    <td class="text-center">{{ $cliente->nombre }}</td>
                    <td class="text-center">{{ $cliente->fecha_nacimiento }}</td>
                    <td class="text-center">{{ $cliente->id }}</td>
                    <td class="text-center">{{ $cliente->correo }}</td>
                    <td class="text-center">{{ $cliente->telefono_1 }}</td>
                    <td class="text-center">{{ $cliente->telefono_2 }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('clientes.delete', $cliente->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
<script> const confirmDelete = () => { return confirm('¿Estás seguro de que deseas eliminar este cliente?');} </script>
@endsection