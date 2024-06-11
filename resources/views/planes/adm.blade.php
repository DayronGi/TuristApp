@extends('layouts.layout')
@section('content')
<h1 class="text-center">Planes turísticos</h1>
<br>
<div class="container">
    <div class="row">
        @foreach ($planes as $plan)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Plan Nro.{{ $plan->planid }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Título: {{ $plan->título }}</h5>
                        <p class="card-text">Descripción: {{ $plan->descripción }}</p>
                        <p class="card-text"><small class="text-body-secondary">Duración: {{ $plan->duración }} días</small></p>
                        <a href="{{ route('planes.edit', $plan->planid) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('planes.delete', $plan->planid) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
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
