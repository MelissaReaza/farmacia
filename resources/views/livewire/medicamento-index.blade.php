<div>
    <div class="container-fluid">
    <div class="row mb-4">
        <div class="col sm-3">
            <a href="{{ route('medicamento.create') }}" class="btn btn-primary border-radius rounded-4" style="background-color:#3334A1;">
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
    <div class="container-fuid table-responsive shadow bg-light rounded-4">
    <table class="table table-hover table-bordered ">
        <thead>
            <tr>
                <th>
                    Cod.
                </th>
                <th>
                    Nombre Generico
                </th>
                <th>
                    Nombre Comercial
                </th>
                <th>
                    Almacen
                </th>
                <th>
                    Lote
                </th>
                <th>
                    Presentacion
                </th>
                <th>
                    Clasificacion
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Cantidad
                </th>
                <th>
                    Detalle
                </th>
                <th>
                    Opciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>
                        {{ $medicamento->codigo }}
                    </td>
                    <td>
                        {{ $medicamento->nombre_comercial }}
                    </td>
                    <td>
                        {{ $medicamento->nombre_generico }}
                    </td>
                    <td>
                        {{ $medicamento->almacen_id }}
                    </td>
                    <td>
                        {{ $medicamento->lote_id }}
                    </td>
                    <td>
                        {{ $medicamento->presentacion->nombre }}
                    </td>
                    <td>
                        {{ $medicamento->clasificacion->descripcion}}
                    </td>
                    <td>
                        {{ $medicamento->precio}}
                    </td>
                    <td>
                        {{ $medicamento->stock}}
                    </td>
                    <td>
                        {{ $medicamento->detalle}}
                    </td>
                    <td>
                        <a href="{{ route('medicamento.edit', $medicamento) }}" class="btn btn-primary border-radius rounded-4" style="background-color: #3B29FE;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg>
                            Editar</a>
                        <a href="{{ route('medicamento.show', $medicamento) }}" class="btn btn-success border-radius rounded-4" style="background-color: #154219;">
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
        {{ $medicamentos->links() }}

</div>

