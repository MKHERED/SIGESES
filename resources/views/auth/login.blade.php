@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/signin.css') }}">
<div style="display: flex;justify-content: space-evenly;">
    <h1 class="h1 mb-1 fw-normal" style="text-decoration: underline; text-decoration-color:orange;">Bienvenido al <b style="color:orange;">SIGESES</b></h1>
</div>
<div class="form-signin w-100 m-auto text-center">
    <div class="card-header h2">Inicie Sección</div>
    <p>Para poder acceder a la gestión de estaciones</p>
    <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" name="username"  value="{{ old('username') }}" require autocomplete="username" autofocus>
            <label for="floatingInput">{{ __('Nombre de Usuario') }}</label>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password"  class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" require autocomplete="current-password">
            <label for="floatingPassword">{{ __('Contraseña') }}</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
            @enderror
        </div>
        <div class="form-floating">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Recordarme</label>
            </div>
        </div>
        <button class="inicio w-100 btn btn-lg  " type="submit">Iniciar</button>
        <p class="mt-5 mb-3 text-muted">Intranet 2022</p>
    </form>
    </div>

</div>
@endsection
