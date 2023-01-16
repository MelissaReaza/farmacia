@extends('tema.app', ['menu' => 5])

@section('title', "Laboratorio")

@section('contenido')
 <div class="mx-auto h2 mt-4" style="width: 200px;">
    Laboratorio
 </div>


    @livewire('laboratorio-index')

@endsection
