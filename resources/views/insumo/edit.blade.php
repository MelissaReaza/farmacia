@extends('tema.app', ['menu' => 2])

@section('title', "Editar Insumo")

@section('contenido')
    <div class="mx-auto h2 mt-4">
        Editar insumo {{$insumo->id}}
    </div>
    <form action="{{ route('insumo.update', $insumo)}}" method="POST">
        @method( 'put' )
        <x-insumo-form-body :insumo="$insumo"/>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
@endsection
