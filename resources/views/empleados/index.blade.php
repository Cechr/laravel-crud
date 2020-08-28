@extends('layouts.app')

@section('content')
<div class="container">

@if (Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

    <br>
    <h1>Hola soy el INDEX - INICIO (Despliegue de datos)</h1>

    <a href="{{ url('empleados/create') }}">Nuevo Empleado</a>
    <br>
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
                
                <td>
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="150">
                </td>
                <td>{{ $empleado->Nombre }}</td>
                <td>{{ $empleado->ApellidoPaterno }}</td>
                <td>{{ $empleado->ApellidoMaterno }}</td>
                <td>{{ $empleado->Correo}}</td>
                
                <td>
                    <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}">Editar</a>
                    
                    | 

                    <form method="POST" action="{{ url('/empleados/'.$empleado->id) }}">
                        
                        @csrf {{-- Mandamos el token para procesar la solicitud --}}
                        
                        @method('DELETE') {{-- Mandamos que tipo de solicitud que requerimos, accediendo al metodo destroy() del controller --}}
                        
                        <button type="submit" onclick="return confirm('¿Desea borrar el registro?');">Borrar</button>

                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection