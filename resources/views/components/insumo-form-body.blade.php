@csrf
<div class="row my-2">
    <div class="col">
        <label for="nombre_comercial" class="form label">Nombre Comercial</label>
        <input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control" placeholder="nombre comercial" aria-describedby="nombre_comercial" value="{{old('nombre_comercial', $insumo->nombre_comercial)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca nombre.
        </div>
    </div>

    <div class="col">
        <label for="detalle" class="form label">Detalle</label>
        <input type="text" name="detalle" id="detalle" class="form-control" value="{{ old('detalle', $insumo->detalle) }}" placeholder="detalle" aria-describedby="detalle">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca dato.
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="almacen_id" class="form label">Número de almacén</label>
        <select name="almacen_id" id="almacen_id" class="form-control">
            @if ($insumo->almacen_id == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($almacenes as $almacen)
                <option value="{{$almacen->id}}" @if ($insumo->almacen_id == $almacen->id) selected @endif>{{$almacen->id}}</option>
            @endforeach
        </select>
    </div>

    <div class="col">
        <label for="lote_id" class="form label">Código de Lote</label>
        <select name="lote_id" id="lote_id" class="form-control">
            @if ($insumo->lote_id == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($lotes as $lote)
                <option value="{{$lote->id}}" @if ($insumo->lote_id == $lote->id) selected @endif>{{$lote->id}} - {{$lote->laboratorios_id}}</option>
            @endforeach
        </select>
    </div>

    <div class="col">
        <label for="precio" class="form label">Precio</label>
        <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio', $insumo->precio) }}" placeholder="introduzca precio" aria-describedby="precio">
    </div>

    <div class="col">
        <label for="stock" class="form label">Cantidad</label>
        <input type="text" name="stock" id="Detalle" class="form-control" value="{{ old('stock', $insumo->stock) }}" placeholder="cantidad" aria-describedby="stock">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca dato.
        </div>
    </div>
</div>

<div class="col-sn-12 text-end my-2">
    <button type="submit" class="btn btn-primary" style="background-color: #1A26C1">
        Guardar
    </button>
</div>
