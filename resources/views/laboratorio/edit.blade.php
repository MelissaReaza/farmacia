@extends('tema.app', ['menu' => 5])

@section('title', "Editar Laboratorio")

@section('contenido')
    <div class="mx-auto h2 mt-4">
       Editar Proveedor {{$laboratorio->razon}}
    </div>
    <form action="{{ route('laboratorio.update', $laboratorio)}}" method="POST">
        @method( 'put' )
        <x-laboratorio-form-body :laboratorio="$laboratorio"/>
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
