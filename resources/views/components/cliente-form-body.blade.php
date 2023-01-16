@csrf
<div class="row my-2">
    <input type="hidden" name="id" id="id" value="{{old('id', $cliente->id)}}">

    <div class="col">
        <label for="Nombre" class="form label">Nombre</label>
        <input type="text" name="nombre" id="Nombre" class="form-control" placeholder="nombre" aria-describedby="Nombre" value="{{old('nombre', $cliente->nombre)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca nombre.
        </div>
    </div>

    <div class="col">
        <label for="CI" class="form label">CI</label>
        <input type="number" name="ci" id="CI" class="form-control" placeholder="ci" aria-describedby="CI" value="{{old('ci', $cliente->ci)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca CI.
        </div>
    </div>
</div>

<div class="col-sn-12 text-end my-2">
    <button type="submit" class="btn btn-primary" style="background-color: #1A26C1">
        Guardar
    </button>
</div>
