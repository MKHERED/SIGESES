@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/signin.css') }}">

<style>
    #remember:checked {
        background-color: #ffc966;
        }
    body {
        background: url("http://10.16.14.7/recursos/login/fondo3.jpeg");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;

        backdrop-filter:blur(1px)
    }
    .blur {
        backdrop-filter:blur(5px);
    }

</style>

<div class="position-absolute top-50 start-50 translate-middle text-center blur p-md-5 p-0  rounded-3">
    <h3 class="text-dark">Inicio de Sesión</h3>
    <div class="rounded border border-1 border-warning p-3">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Pedro"  name="username"  value="{{ old('username') }}" require autocomplete="username" autofocus>
            <label for="floatingInput">{{ __('Nombre de Usuario') }}</label>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
            @enderror
        </div>

        <div class="form-floating mb-3">
        <input type="password" class="form-control @error('username') is-invalid @enderror" id="floatingInput2" placeholder="******"  name="password"  value="{{ old('password') }}" require autocomplete="current-password" autofocus>
        <label for="floatingInput2">{{ __('Contraseña') }}</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <button class="inicio btn btn-sm btn-outline-warning w-100" type="submit">Iniciar</button>
        </div>
        <div class="form-floating text-start">
            <div class="form-check form-switch">
                <input class="form-check-input border-warning" role="switch" type="checkbox" name="remember" style="accent-color:orange;" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-light" for="remember">Recordarme</label>
            </div>
        </div>
    </form>

        
    </div>
</div>
<div class="position-absolute bottom-0 start-50 translate-middle text-center mt-2">
    <p id="piso" class="mt-4 mb-3 text-muted text-dark">Intranet </p>
    <script>
        const fecha = new Date();
        const añoActual = fecha.getFullYear();
        piso = document.querySelector('#piso');
        piso.innerHTML = "Intranet "+añoActual;
    </script>
    <!--script>
        var body = document.body;
         fondo = 'http://10.16.14.7/img/login/fondo.png'


        console.log(body.style.background)
        body.style.background = fondo;
        console.log(body.style.background)

    </script-->
</div>










@endsection
