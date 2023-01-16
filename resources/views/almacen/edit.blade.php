@extends('tema.app', ['menu' => 3])

@section('title', "Editar Almacen")

@section('contenido')
    <h3>
       Editar Almacen {{$almacen->rac}}
    </h3>
    <form action="{{ route('almacen.update', $almacen)}}" method="POST">
        @method( 'put' )
        <x-almacen-form-body :almacen="$almacen"/>
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
