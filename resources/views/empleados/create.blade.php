<a href="{{ url('empleados') }}">Regresar</a>
<br>
<h1>Hola soy el Create de Empleados</h1>
<form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}

    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="">
    <br>

    <label for="ApellidoPaterno">{{'ApellidoPaterno'}}</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="">
    <br>

    <label for="ApellidoMaterno">{{'ApellidoMaterno'}}</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="">
    <br>

    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" id="Correo" value="">
    <br>

    <label for="Foto">{{'Foto'}}</label>
    <input type="file" name="Foto" id="Foto" value="">
    <br>

    <input type="submit" value="Añadir">
</form>