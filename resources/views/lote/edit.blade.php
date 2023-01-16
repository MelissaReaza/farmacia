@extends('tema.app', ['menu' => 4])

@section('title', "Editar Lote")

@section('contenido')
    <div class="mx-auto h2 mt-4">
       Editar Proveedor {{$lote->id}}
    </div>
    <form action="{{ route('lote.update', $lote)}}" method="POST">
        @method( 'put' )
        <x-lote-form-body :lote="$lote"/>
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
