<div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col sm-3">
                <a href="{{ route('venta.create') }}" class="btn btn-primary border-radius rounded-4" style="background-color:#3334A1;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                    Agregar nuevo</a>
            </div>
            <div class="col-sm-2">
                <input type="text" aria-label="Busqueda"  placeholder="Buscar..." class="form-control border-radius rounded-4" wire:model="busqueda">
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                <p>Mostrar</p>
                <select class="form-select border-radius rounded-4" aria-label="Numeracion de paginacion" wire:model="paginacion">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <p>registros.</p>
                </div>
            </div>
        </div>
        <div class="container-fuid shadow bg-light rounded-4">
            <table class="table table-responsive table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Estado</th>
                        <th class="text-end">Total Factura</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $venta->nombre_cliente }}</td>
                        <td>{{ $venta->nombre_usuario }} {{ $venta->apellido_usuario }}</td>
                        <td>
                            <span class="fw-normal badge
                                @switch($venta->nombre_estado)
                                    @case('Pagado')
                                        bg-success
                                        @break
                                    @case('Descargo')
                                        bg-secondary
                                        @break
                                    @case('Anulado')
                                        bg-danger
                                        @break
                                @endswitch
                            ">{{ $venta->nombre_estado }}</span>
                        </td>
                        <td class="text-end">{{ number_format($venta->total, 2, ',', '.') }} Bs.</td>
                        <td>
                            <a href="/venta/{{ $venta->id }}?pdf=0" class="btn btn-success border-radius rounded-4" style="background-color: #154219;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                                Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $ventas->links() }}
</div>
