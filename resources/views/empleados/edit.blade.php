
<form action="{{ url('/empleados/'.$datosEmpleado->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    @include('empleados.form', ['Modo'=>'editar'])    

</form>