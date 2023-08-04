@extends('layouts.app')

@section('content')

<div class="text-center">
    <script src="{{asset('js/gestion.js') }}"></script>
    <h4 class="mt-3">Lo siento pero no tiene {{$mensaje['error']}}</h4>
    <div id="imagenes" class="text-center">


    <script>
            var img = document.getElementById('imagenes')
            img = img.childElementCount;
            url = "{{route('update',$mensaje['id'])}}"
            ImagenVerif(img, url);
    </script>

    </div>
</div>



@endsection