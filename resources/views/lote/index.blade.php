@extends('tema.app', ['menu' => 4])

@section('title', "Lote")

@section('contenido')
 <div class="mx-auto h2 mt-4" style="width: 200px;">
    Lote
 </div>


    @livewire('lote-index')

@endsection
