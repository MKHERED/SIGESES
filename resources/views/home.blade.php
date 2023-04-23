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
</style>
<div id="mapa" class=" text-light">
</div>
@endsection
