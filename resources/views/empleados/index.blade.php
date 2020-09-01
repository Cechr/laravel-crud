@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1>Hola soy el INDEX - INICIO (Despliegue de datos)</h1>

    <a href="{{ url('empleados/create') }}" class="btn btn-success">Nuevo Empleado</a>
    <br>
    <br>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                
                <th>Foto</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <td>{{ $loop->iteration }}</td>
                
                <td>
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="100" class="img-thumbnail img-fluid">
                </td>
                <td>{{ $empleado->Nombre }} {{ $empleado->ApellidoPaterno }} {{ $empleado->ApellidoMaterno }}</td>
                <td>{{ $empleado->Correo}}</td>
                
                <td>
                    <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-warning">Editar</a>

                    <form method="POST" action="{{ url('/empleados/'.$empleado->id) }}" class="d-inline formulario-eliminar">
                        
                        @csrf {{-- Mandamos el token para procesar la solicitud --}}
                        
                        @method('DELETE') {{-- Mandamos que tipo de solicitud que requerimos, accediendo al metodo destroy() del controller --}}
                        
                        <button type="submit" class="btn btn-danger display inline">Borrar</button>

                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('js')

    @if (Session('Mensaje')=='Eliminado')
        <script>
            Swal.fire('¡Eliminado!','El registro ha sido eliminado con éxito.','success');
        </script>
    @endif
    @if (Session('Mensaje')=='Actualizado')
        <script>
            Swal.fire('¡Actualizado!','El registro ha sido actualizado con éxito.','success');
        </script>
    @endif
    @if (Session('Mensaje')=='Agregado')
        <script>
            Swal.fire('¡Agregado!','El registro ha sido agregado con éxito.','success');
        </script>

    @endif

    <script>
        
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El registro de eliminará de manera permanente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, !Estoy seguro!'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                }
            });

        });
        
    </script>

@endsection