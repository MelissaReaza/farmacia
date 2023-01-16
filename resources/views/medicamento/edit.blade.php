@extends('tema.app', ['menu' => 1])

@section('title', "Editar Medicamento")

@section('contenido')
    <div class="mx-auto h2 mt-4">
       Editar medicamento {{$medicamento->id}}
    </div>
    <form action="{{ route('medicamento.update', $medicamento)}}" method="POST">
        @method( 'put' )
        <x-medicamento-form-body :medicamento="$medicamento"/>
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
