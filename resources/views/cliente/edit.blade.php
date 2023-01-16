@extends('tema.app', ['menu' => 8])

@section('title', "Editar Cliente")

@section('contenido')
    <div class="mx-auto h2 mt-4">
        Editar cliente {{$cliente->id}}
    </div>
    <form action="{{ route('cliente.update', $cliente)}}" method="POST">
        @method('put')
        <x-cliente-form-body :cliente="$cliente"/>
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
