@extends('tema.app', ['menu' => 3])

@section('title', "Registro Lote")

@section('contenido')
    <div class="mx-auto h2 m-4">
        Registrar Nuevo Lote
    </div>
    <button type="button" class="btn btn-secondary border-radius rounded-4" aria-label="cerrar" style="background-color: #674C21; color: white">
        <a href="{{ route ('lote.index')}}" style="color: white">Volver/Cancelar</a>
    </button>


    <form action="{{ route('lote.store')}}" method="POST">
        <x-lote-form-body/>
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
