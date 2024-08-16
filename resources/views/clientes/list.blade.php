@extends('layouts.layout')
@section('content')
    <div class="container">
        <h1 class="text-center">Clientes</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Fecha de nacimiento</th>
                        <th class="text-center">Cédula</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Teléfono 1</th>
                        <th class="text-center">Teléfono 2</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td class="text-center align-middle">{{ $cliente->nombre }}</td>
                            <td class="text-center align-middle">{{ $cliente->fecha_nacimiento }}</td>
                            <td class="text-center align-middle">{{ $cliente->cliente_id }}</td>
                            <td class="text-center align-middle">{{ $cliente->correo }}</td>
                            <td class="text-center align-middle">{{ $cliente->telefono_1 }}</td>
                            <td class="text-center align-middle">{{ $cliente->telefono_2 }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('clientes.edit', $cliente->cliente_id) }}" class="text-secondary mr-3"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('clientes.delete', $cliente->cliente_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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
            return confirm('¿Estás seguro de que deseas eliminar este cliente?');
        }
    </script>
@endsection