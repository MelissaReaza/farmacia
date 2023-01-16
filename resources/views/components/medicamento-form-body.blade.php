@csrf
<div class="row my-2">
    <div class="col">
        <label for="NombreComercial" class="form label">Nombre Comercial</label>
        <input type="text" name="nombre_comercial" id="NombreComercial" class="form-control" placeholder="nombre comercial" aria-describedby="NombreComercial" value="{{old('nombre_comercial', $medicamento->nombre_comercial)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca nombre.
          </div>
    </div>

    <div class="col">
        <label for="NombreGenerico" class="form label">Nombre Generico</label>
        <input type="text" name="nombre_generico" id="NombreGenerico" class="form-control" value="{{ old('nombre_generico', $medicamento->nombre_generico) }}" placeholder="nombre generico" aria-describedby="NombreGenerico">
        <div id="NombreGenerico" class="invalid-feedback">
            Porfavor introduzca nombre.
          </div>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="Almacen" class="form label">Número de almacén</label>
        <select name="almacen_id" id="almacen" class="form-control">
            @if ($medicamento->almacen_id == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($almacenes as $almacen)
                <option value="{{$almacen->id}}" @if ($medicamento->almacen_id == $almacen->id) selected @endif>{{$almacen->id}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="almacen_id" id="Almacen" class="form-control" value="{{ old('almacen_id', $medicamento->almacen_id) }}" placeholder="código de Almacén" aria-describedby="Almacen">  --}}
    </div>

    <div class="col">
        <label for="Lote" class="form label">Código de Lote</label>
        <select name="lote_id" id="lote" class="form-control">
            @if ($medicamento->lote_id == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($lotes as $lote)
                <option value="{{$lote->id}}" @if ($medicamento->lote_id == $lote->id) selected @endif>{{$lote->id}} - {{$lote->laboratorios_id}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="lote_id" id="Lote" class="form-control" value="{{ old('lote_id', $medicamento->lote_id) }}" placeholder="código de Lote" aria-describedby="Lote">  --}}
    </div>

    <div class="col">
        <label for="Presentacion" class="form label">Presentación</label>
        <select name="presentacion_id" id="presentacion" class="form-control">
            @if ($medicamento->presentacion_id == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($presentaciones as $presentacion)
                <option value="{{$presentacion->id}}" @if ($medicamento->presentacion_id == $presentacion->id) selected @endif>{{$presentacion->nombre}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="presentacion_id" id="Presentacion" class="form-control" value="{{ old('presentacion_id', $medicamento->presentacion_id) }}" placeholder="código de Presentación" aria-describedby="Presentacion">  --}}
    </div>

    <div class="col">
        <label for="Clasificacion" class="form label">Clasificación</label>
        <select name="clasificacion_id" id="clasificacion" class="form-control">
            @if ($medicamento->clasificacion_id == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($clasificaciones as $clasificacion)
                <option value="{{$clasificacion->id}}" @if ($medicamento->clasificacion_id == $clasificacion->id) selected @endif>{{$clasificacion->descripcion}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="clasificacion_id" id="Clasificacion" class="form-control" value="{{ old('clasificacion_id', $medicamento->clasificacion_id) }}" placeholder="código de Clasificación" aria-describedby="Clasificacion">  --}}
    </div>

    <div class="col">
        <label for="Precio" class="form label">Precio</label>
        <input type="text" name="precio" id="Precio" class="form-control" value="{{ old('precio', $medicamento->precio) }}" placeholder="introduzca precio" aria-describedby="Precio">
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="Cantidad" class="form label">Cantidad</label>
        <input type="text" name="stock" id="Detalle" class="form-control" value="{{ old('stock', $medicamento->stock) }}" placeholder="Cantidad" aria-describedby="Cantidad">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca dato.
          </div>
    </div>
    <div class="col">
        <label for="Detalle" class="form label">Detalle</label>
        <input type="text" name="detalle" id="Detalle" class="form-control" value="{{ old('detalle', $medicamento->detalle) }}" placeholder="Detalle" aria-describedby="Detalle">
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

    
