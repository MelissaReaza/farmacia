@extends('tema.app', ['menu' => 8])

@section('title', "Cliente")

@section('contenido')
 <div class="cotainer-fluid">

 <div class="mx-auto h2 mt-4" style="width: 200px;">
    Clientes
 </div>


    @livewire('cliente-index')

  </div>

@endsection
