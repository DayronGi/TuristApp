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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection