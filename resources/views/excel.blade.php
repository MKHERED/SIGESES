@extends('layouts.app')

@section('content')
<head>
    <title>SIGESES: Carga del excel</title>
        <!-- Scripts -->
        
</head>
<body>
<div class="container mt-2 p-0">
    <div class="row rounded bg-dark ">
        <div class="bg-success col-12">
            <h2 class="text-light text-center">Sistema para cargar datos de las estaciones</h2> 
        </div>        
    
        <div class="m-2 col-3"> 
            <select name="estacion" id="" class="form-select">
                <option value="none">Elija una Estación</option>

            @foreach ($estaciones as $estacion)
                <option value="{{$estacion->siglas}}">{{$estacion->nombre}}: {{$estacion->siglas}}</option>
            @endforeach
            </select>                
        </div>
        <div class="mt-2 col-8 d-flex">
            <h5 class="text-light text-end align-self-center m-0">Formato de Documento: Excel</h5> 
            
        </div>
        <div class="mt-2 col-12 text-light">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente molestias vitae, harum optio quo necessitatibus voluptatum unde eum culpa, cupiditate repellendus quasi est in, error deleniti architecto ut officia quae.
        </div>        
    </div>

</div>

</body>
</html>
@endsection

