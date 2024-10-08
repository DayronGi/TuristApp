@extends('layouts.layout')

@section('content')
    <h1 class="text-center">Puntos de visita</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" action="{{ route('puntos.verify') }}">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection