@extends('tema.app', ['menu' => 6])

@section('title', "Reportes")

@section('contenido')
<div class="cotainer-fluid">
    <div class="mx-auto h2 mt-4 text-center">
        Reporte de Stocks Reducidos
    </div>
    <div class="row m-3">
        <div class="col">
            <a type="button" class="btn btn-primary border-radius rounded-4" style="background-color:#3334A1;" href="{{ route('reporte.pdf_bajo_stock') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                </svg>
                Imprimir
            </a>
        </div>
    </div>
    <div class="row m-3">
        <div class="col table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo</th>
                        <th>Nombre Comercial</th>
                        <th>Nombre Genérico</th>
                        <th>Detalle</th>
                        <th>Proveedor</th>
                        <th>Fecha de Ingreso</th>
                        <th>Stock</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $i => $producto)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $producto->nombre_categoria }}</td>
                        <td>{{ $producto->nombre_comercial }}</td>
                        <td>{{ $producto->nombre_generico }}</td>
                        <td>{{ $producto->detalle }}</td>
                        <td>{{ $producto->proveedor }}</td>
                        <td>{{ $producto->fecha_ingreso }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <span class="fw-normal badge
                                @switch($producto->estado)
                                    @case('Agotado')
                                        bg-danger
                                        @break
                                    @default
                                        bg-success
                                        @break
                                @endswitch
                            ">{{ $producto->estado }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
