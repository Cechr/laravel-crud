    <a href="{{ url('empleados') }}">Regresar</a>
    <br>
    <br>
    
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="{{ isset($datosEmpleado->Nombre) ? $datosEmpleado->Nombre : '' }}">
    <br>

    <label for="ApellidoPaterno">{{'ApellidoPaterno'}}</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ isset($datosEmpleado->ApellidoPaterno) ? $datosEmpleado->ApellidoPaterno : '' }}">
    <br>

    <label for="ApellidoMaterno">{{'ApellidoMaterno'}}</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{ isset($datosEmpleado->ApellidoMaterno) ? $datosEmpleado->ApellidoMaterno : '' }}">
    <br>

    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" id="Correo" value="{{ isset($datosEmpleado->Correo) ? $datosEmpleado->Correo : '' }}">
    <br>

    <label for="Foto">{{'Foto'}}</label>

    @if (isset($datosEmpleado->Foto))

    <br>
    <img src="{{ asset('storage').'/'.$datosEmpleado->Foto }}" alt="" width="150">
    <br>

    @endif

    <input type="file" name="Foto" id="Foto" value="">
    <br>
    <br>
    <input type="submit" value="{{ $Modo=='crear' ? 'AÑADIR' : 'GUARDAR CAMBIOS' }}">