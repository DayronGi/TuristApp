@extends('layouts.layout')

@section('title', 'Verificación de Contraseña')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Verificación de Contraseña') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.check-password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autofocus>
                        </div>

                        <input type="hidden" name="redirect" value="{{ request()->input('redirect') }}">

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Verificar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection