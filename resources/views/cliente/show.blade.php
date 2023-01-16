@extends('tema.app', ['menu' => 8])

@section('title', "Cliente Ver")

@section('contenido')
<div class="card mt-2">
    <div class="card-body">
        <h3 class="card-title">Código de cliente: 0000{{$cliente->id}}</h3>
        <ul>
            <li>
                Nombre: <strong> {{ $cliente->nombre }} </strong>
            </li>
            <li>
                CI: <strong>{{ $cliente->ci }}</strong>
            </li>
        </ul>

        <button class="btn btn-danger border-radius rounded-4" type="button" style="background-color: #B30404;" data-bs-toggle="modal" data-bs-target="#modalConfirmacion"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg> Eliminar</button>

        <div class="modal" id="modalConfirmacion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" fill="#F15E5E" class="bi bi-x-circle" viewBox="0 0 16 16" style="margin: 0 auto;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                    <div class="modal-body" style="margin: 0 auto;">
                        <h5>¿Seguro que desea eliminar el cliente?</h5>
                    </div>
                    <div class="modal-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col text-end">
                                    <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                                <div class="col text-start">
                                    <form action="{{ route('cliente.destroy', $cliente) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-danger">Eliminar</button>
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
