@extends('tema.app', ['menu' => 2])

@section('title', "Insumo")

@section('contenido')
 <div class="cotainer-fluid">

 <div class="mx-auto h2 mt-4" style="width: 200px;">
    Insumos
 </div>


    @livewire('insumo-index')

  </div>

@endsection
