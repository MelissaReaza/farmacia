@extends('tema.app', ['menu' => 3])

@section('title', "Almacen")

@section('contenido')
 <div class="mx-auto h2 mt-4" style="width: 200px;">
    Almacen
 </div>


    @livewire('almacen-index')

@endsection
