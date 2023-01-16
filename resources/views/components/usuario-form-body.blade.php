@csrf
<div class="row my-2">
    <input type="hidden" name="id" id="id" value="{{old('id', $usuario->id)}}">

    <div class="col">
        <label for="Nombre" class="form label">Nombre</label>
        <input type="text" name="nombre" id="Nombre" class="form-control" placeholder="nombre" aria-describedby="Nombre" value="{{old('nombre', $usuario->nombre)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca nombre.
        </div>
    </div>

    <div class="col">
        <label for="ApellidoP" class="form label">Apellido Paterno</label>
        <input type="text" name="apellido_p" id="ApellidoP" class="form-control" placeholder="apellido paterno" aria-describedby="ApellidoP" value="{{old('apellido_p', $usuario->apellido_p)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca apellido paterno.
        </div>
    </div>

    <div class="col">
        <label for="ApellidoM" class="form label">Apellido Materno</label>
        <input type="text" name="apellido_m" id="ApellidoM" class="form-control" placeholder="apellido materno" aria-describedby="ApellidoM" value="{{old('apellido_m', $usuario->apellido_m)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca apellido materno.
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="Email" class="form label">Email</label>
        <input type="text" name="email" id="Email" class="form-control" placeholder="email" aria-describedby="Email" value="{{old('email', $usuario->email)}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca email.
        </div>
    </div>

    <div class="col">
        <label for="Password" class="form label">Contraseña</label>
        <input type="password" name="password" id="Password" class="form-control" placeholder="contraseña" aria-describedby="Password" value="{{old('password')}}">
        <div id="validacion" class="invalid-feedback">
            Porfavor introduzca contraseña.
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <label for="Rol" class="form label">Rol</label>
        <select name="id_rol" id="rol" class="form-control">
            @if ($usuario->id_rol == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($roles as $rol)
                <option value="{{$rol->id}}" @if ($usuario->id_rol == $rol->id) selected @endif>{{$rol->nombre}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="id_rol" id="Rol" class="form-control" value="{{ old('id_rol', $usuario->id_rol) }}" placeholder="rol" aria-describedby="Rol">  --}}
    </div>

    <div class="col">
        <label for="Departamento" class="form label">Departamento</label>
        <select name="id_departamento" id="rol" class="form-control">
            @if ($usuario->id_departamento == null)
                <option value="" selected disabled>--seleccione--</option>
            @endif
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id}}" @if ($usuario->id_departamento == $departamento->id) selected @endif>{{$departamento->descripcion}}</option>
            @endforeach
        </select>
        {{--  <input type="text" name="id_departamento" id="Departamento" class="form-control" value="{{ old('id_departamento', $usuario->id_departamento) }}" placeholder="departamento" aria-describedby="Departamento">  --}}
    </div>
</div>

<div class="col-sn-12 text-end my-2">
    <button type="submit" class="btn btn-primary" style="background-color: #1A26C1">
        Guardar
    </button>
</div>
