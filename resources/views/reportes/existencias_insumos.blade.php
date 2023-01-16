@extends('tema.app', ['menu' => 6])

@section('title', "Reportes")

@section('contenido')
<div class="cotainer-fluid">
    <div class="mx-auto h2 mt-4 text-center">
        Reporte de Insumos Actuales
    </div>
    <div class="row m-3">
        <div class="col">
            <a type="button" class="btn btn-primary border-radius rounded-4" style="background-color:#3334A1;" href="{{ route('reporte.pdf_existencias_insumos') }}">
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
                        <th>Insumo</th>
                        <th>Detalle</th>
                        <th>Almacen</th>
                        <th>Lote</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insumos as $i => $insumo)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $insumo->nombre_comercial }}</td>
                        <td>{{ $insumo->detalle }}</td>
                        <td>{{ $insumo->almacen_id }}</td>
                        <td>{{ $insumo->lote_id }}</td>
                        <td>{{ $insumo->stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
