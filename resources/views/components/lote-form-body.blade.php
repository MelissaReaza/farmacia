@csrf
<div class="row my-2">
    <div class="col">
        <label for="Laboratorio" class="form label">Código de Laboratorio</label>
        <select name="laboratorios_id" id="laboratorios" class="form-control">
            <option value="" selected disabled>--seleccione--</option>
            @foreach ($laboratorios as $laboratorio)
                <option value="{{$laboratorio->id}}">{{$laboratorio->id}} - {{$laboratorio->razon}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="laboratotio_id" id="Laboratorio" class="form-control" value="{{ old('laboratorios_id', $medicamento->laboratorios_id) }}" placeholder="código de Laboratorio" aria-describedby="Laboratorio">  --}}
    </div>

    <div class="col">
        <label for="Ingreso" class="form label">Fecha de ingreso</label>
        <input type="datatime-local" name="fecha_ingreso" id="Ingreso" class="form-control" value="{{ old('fecha_ingreso', $lote->fecha_ingreso) }}" placeholder="fecha" aria-describedby="Ingreso">
    </div>

    <div class="col">
        <label for="Vencimiento" class="form label">Fecha de Vencimiento</label>
        <input type="datatime-local" name="fecha_vencimiento" id="Vencimiento" class="form-control" value="{{ old('fecha_vencimiento', $lote->fecha_vencimiento) }}" placeholder="fecha" aria-describedby="Vencimiento">
    </div>
</div>

<div class="col-sn-12 text-end my-2">
    <button type="submit" class="btn btn-primary" style="background-color: #1A26C1">
        Guardar
    </button>
</div>
