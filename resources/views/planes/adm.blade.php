@extends('layouts.layout')
@section('content')
<div class="container">
    <h1 class="text-center">Planes Turísticos</h1>
    <br>
    <div class="row">
        @foreach ($planes as $plan)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="my-0">Plan Nro.{{ $plan->plan_id }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $plan->titulo }}</h5>
                        <p class="card-text">{{ $plan->descripcion }}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Duración: {{ $plan->duracion }} días</li>
                            <li class="list-group-item">Incluye Desayuno: {{ $plan->incluye_desayuno == 'true' ? 'Sí' : 'No' }}</li>
                            <li class="list-group-item">Incluye Almuerzo: {{ $plan->incluye_almuerzo == 'true' ? 'Sí' : 'No' }}</li>
                            <li class="list-group-item">Incluye Cena: {{ $plan->incluye_cena == 'true' ? 'Sí' : 'No' }}</li>
                        </ul>
                        <div class="mt-3 d-flex justify-content-end">
                            <a href="{{ route('planes.edit', $plan->plan_id) }}" class="text-secondary mr-3"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('planes.delete', $plan->plan_id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    const confirmDelete = () => {
        return confirm('¿Estás seguro de que deseas eliminar este plan?');
    }
</script>
@endsection