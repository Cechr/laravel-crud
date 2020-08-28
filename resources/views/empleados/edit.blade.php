<a href="{{ url('empleados') }}">Regresar</a>
<br>
<h1>Hola soy el Edit (Update) de Empleados</h1>
<form action="{{ url('/empleados/'.$datosEmpleado->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="{{ $datosEmpleado->Nombre }}">
    <br>

    <label for="ApellidoPaterno">{{'ApellidoPaterno'}}</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ $datosEmpleado->ApellidoPaterno }}">
    <br>

    <label for="ApellidoMaterno">{{'ApellidoMaterno'}}</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{ $datosEmpleado->ApellidoMaterno }}">
    <br>

    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" id="Correo" value="{{ $datosEmpleado->Correo }}">
    <br>

    <label for="Foto">{{'Foto'}}</label>
    <br>
    <img src="{{ asset('storage').'/'.$datosEmpleado->Foto }}" alt="" width="150">
    <br>
    <input type="file" name="Foto" id="Foto" value="">
    <br>

    <input type="submit" value="Guardar cambios">
</form>