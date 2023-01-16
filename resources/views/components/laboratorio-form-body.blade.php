@csrf
<div class="row my-2">
    <div class="col ">
        <label for="InputRazon" class="form label">Razón Laboratorio</label>
        <input type="text" name="razon" id="InputRazon" class="form-control" placeholder="introduzca nombre de laboratorio" aria-describedby="InputRazon" value="{{old('razon', $laboratorio->razon)}}">
        <div id="validacionRazon" class="invalid-feedback">
            Porfavor introduzca razon.
          </div>
    </div>

    <div class="col">
        <label for="InputTelefono" class="form label">Contacto Laboratorio</label>
        <input type="number" name="telefono" id="InputTelefono" class="form-control" value="{{ old('telefono', $laboratorio->telefono) }}" placeholder="introduzca telefono del laboratorio" aria-describedby="InputTelefono">
        <div id="validacionTelefono" class="invalid-feedback">
            Porfavor introduzca contacto.
          </div>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="InputEmail" class="form label">Email Laboratorio</label>
        <input type="text" name="email" id="InputEmail" class="form-control" value="{{ old('email', $laboratorio->email) }}" placeholder="introduzca email de laboratorio" aria-describedby="InputEmail">
        <div id="validacionRazon" class="invalid-feedback">
            Porfavor introduzca razon.
          </div>
    </div>

    <div class="col">
        <label for="InputDireccion" class="form label">Dirección Laboratorio</label>
        <input type="text" name="direccion" id="InputDireccion" class="form-control" value="{{ old('direccion', $laboratorio->direccion) }}" placeholder="introduzca dirección del laboratorio" aria-describedby="InputDireccion">
    </div>
    <div class="col-sn-12 text-end my-2">
        <button type="submit" class="btn btn-primary border-radius rounded-4" style="background-color: #1A26C1">
            Guardar
        </button>
    </div>
</div>
