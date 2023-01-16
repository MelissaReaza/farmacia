@csrf
<div class="row my-2">
    <div class="col">
        <label for="InputRac" class="form label">Rac de almacen</label>
        <input type="text" name="rac" id="InputRac" class="form-control" placeholder="introduzca rac" aria-describedby="InputRac" value="{{old('rac', $almacen->rac)}}">
        <div id="validacionRazon" class="invalid-feedback">
            Porfavor introduzca razon.
          </div>
    </div>

    <div class="col">
        <label for="InputTemperatura" class="form label">Temperatura de almacen</label>
        <input type="text" name="temperatura" id="InputTemperatura" class="form-control" value="{{ old('temperatura', $almacen->temperatura) }}" placeholder="introduzca temperatura de almacen" aria-describedby="InputTemperatura">
        <div id="validacionTelefono" class="invalid-feedback">
            Porfavor introduzca contacto.
          </div>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="InputDetalle" class="form label">Detalle</label>
        <input type="text" name="detalle" id="InputDetalle" class="form-control" value="{{ old('detalle', $almacen->detalle) }}" placeholder="introduzca detalle" aria-describedby="InputDetalle">
        <div id="validacionRazon" class="invalid-feedback">
            Porfavor introduzca razon.
          </div>
    </div>

    <div class="col-sn-12 text-end my-2">
        <button type="submit" class="btn btn-primary" style="background-color: #1A26C1">
            Guardar
        </button>
    </div>
</div>