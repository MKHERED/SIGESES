@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/styles.css') }}">
<style>
    #mapa {
        background-image: url("{{asset('img/mpa.png') }}");
        background-size: 100% 100%;
        width: 100%;
        height: 100%;
        position: absolute;
    }
    #cover {
        width: 100%;
        height: 100%;
        opacity: 90%;
    }
</style>
<div id="mapa" >

</div>




@endsection
