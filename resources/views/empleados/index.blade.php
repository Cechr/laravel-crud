<h1>Hola soy el INDEX - INICIO (Despliegue de datos)</h1>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)
        <tr>
            <td>{{ $loop->iteration }}</td>
            
            <td>{{ $empleado->Foto }}</td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->Correo}}</td>
            
            <td>Editar | Borrar</td>
        </tr>
    @endforeach
    </tbody>
</table>