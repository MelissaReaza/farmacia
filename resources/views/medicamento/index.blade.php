@extends('tema.app', ['menu' => 1])

@section('title', "Medicamento")

@section('contenido')

 <div class="cotainer-fluid">

 <div class="mx-auto h2 mt-4" style="width: 200px;">
    Medicamentos
 </div>


    @livewire('medicamento-index')

  </div>

@endsection
