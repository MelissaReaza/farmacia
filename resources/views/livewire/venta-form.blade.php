<div>
    <div class="row my-2">
        <div class="col-5">
            <fieldset class="border py-1 px-4">
                <legend class="float-none w-auto px-2">Datos de la venta</legend>
                <div class="row my-2">
                    <div class="col">
                        <label for="glosa" class="form label">Glosa</label>
                        <input type="text" name="glosa" id="glosa" class="form-control" placeholder="glosa" aria-describedby="glosa">
                        <div id="validacionGlosa" class="invalid-feedback">
                            Porfavor introduzca glosa.
                        </div>
                    </div>

                    <div class="col">
                        <label for="id_estado_venta" class="form label">Estado</label>
                        <select wire:change="seleccionarEstado($event.target.value)" name="id_estado_venta" id="id_estado_venta" class="form-control">
                            <option value="" selected disabled>--seleccione--</option>
                            @foreach ($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col search-box">
                        <label for="buscar_cliente">Buscar cliente</label>
                        <input type='text' class="form-control" id="buscar_cliente" placeholder="Nombre de cliente" wire:model="buscarCliente" wire:keyup="filtroClientes">
                        @if ($mostrarListaClientes)
                            <ul >
                            @if (!empty($clientes))
                                @foreach ($clientes as $cliente)
                                <li wire:click="seleccionarCliente({{ $cliente->id }})">{{ $cliente->nombre }}</li>
                                @endforeach
                            @endif
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="row my-2">
                    <input type="hidden" name="id_cliente" id="id_cliente" value="{{ $id_cliente }}">

                    <div class="col">
                        <label for="nombre_cliente" class="form label">Cliente</label>
                        <input readonly type="text" class="form-control" id="nombre_cliente" aria-describedby="nombre_cliente" value="{{ $cliente->nombre ?? null }}">
                    </div>

                    <div class="col">
                        <label for="ci_cliente" class="form label">CI</label>
                        <input readonly type="text" class="form-control" id="ci_cliente" aria-describedby="ci_cliente" value="{{ $cliente->ci ?? null }}">
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-7">
            <fieldset class="border py-1 px-4">
                <legend class="float-none w-auto px-2">Productos</legend>
                <div class="row my-2">
                    <div class="col search-box">
                        <label for="buscar_producto">Buscar producto</label>
                        <input type='text' class="form-control" id="buscar_producto" placeholder="Nombre de producto" wire:model="buscarProducto" wire:keyup="filtroProductos">
                        @if ($mostrarListaProductos)
                            <ul >
                            @if (!empty($productos))
                                @foreach ($productos as $producto)
                                <li wire:click="seleccionarProducto({{ $producto->id }})">{{ $producto->nombre_comercial }}</li>
                                @endforeach
                            @endif
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="row my-2">
                    <div class="col table-responsive">
                        <table class="table table-hover table-bordered" style="background-color: white;">
                            <thead>
                                <tr>
                                    <th width="10%">Código</th>
                                    <th width="25%">Nombre</th>
                                    <th width="20%">Stock Max.</th>
                                    <th width="20%">Precio Unitario</th>
                                    <th width="15%">Cantidad</th>
                                    <th width="20%">Subtotal</th>
                                    <th width="10%">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\Cart::session(auth()->user()->id)->getContent()->sort(0) as $producto)
                                <tr>
                                    <td>{{ $producto->attributes['codigo'] }}</td>
                                    <td>{{ $producto->name }}</td>
                                    <td>{{ $producto->attributes['max_stock'] }}</td>
                                    <td>{{ number_format($producto->price, 2, ',', '.') }}</td>
                                    <td class="text-end">
                                        <input wire:change="cantidadProducto({{ $producto->id }}, $event.target.value)" class="form-control" type="number" min="1" value="{{ $producto->quantity }}"/>
                                    </td>
                                    <td class="text-end">{{ number_format($producto->getPriceSum(), 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        <div wire:click="quitarProducto({{ $producto->id }})" class="btn btn-danger m-0 pt-0 pb-1 px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-end">
                                        <strong>
                                            Total
                                        </strong>
                                    </td>
                                    <td class="text-start">
                                        <strong>
                                            <span style="padding-left: 10px;">
                                                {{ \Cart::session(auth()->user()->id)->getTotalQuantity() }}
                                            </span>
                                        </strong>
                                    </td>
                                    <td class="text-end">
                                        <strong>
                                            {{ number_format(\Cart::session(auth()->user()->id)->getTotal(), 2, ',', '.') }}
                                        </strong>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="col-sn-12 text-end my-2">
        <button type="submit" class="btn" style="background-color: #1A26C1; color: white;" @if (!$valido) disabled @endif>
            Guardar
        </button>
    </div>

    <style type="text/css">
        .search-box ul{
            z-index: 1000;
            list-style: none;
            padding: 0px;
            width: 250px;
            position: absolute;
            margin: 0;
            background: lavender;
        }
        .search-box ul li{
            background-color: #1A26C1;
            color: white;
            padding: 4px;
            margin-bottom: 1px;
        }
        .search-box ul li:hover{
            cursor: pointer;
            background-color: #2C303B;
        }
    </style>
</div>

