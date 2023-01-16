@extends('tema.app', ['menu' => 2])

@section('title', "Registro Insumo")

@section('contenido')
    <div class="mx-auto h2 m-4">
        Registrar Nuevo Insumo
    </div>
    <button type="button" class="btn btn-secondary" aria-label="cerrar" style="background-color: #674C21; color: white">
        <a href="{{ route ('insumo.index')}}" style="color: white">Volver/Cancelar</a>
    </button>


    <form action="{{ route('insumo.store')}}" method="POST">
        <x-insumo-form-body/>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger" style="background-color: white; color:#2C303B">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
@endsection
