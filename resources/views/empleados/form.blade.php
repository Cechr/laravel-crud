@extends('layouts.app')

@section('content')
<div class="container">    
    @if ($Modo=='crear')
        <h1>Hola soy el Create de Empleados</h1>
    @else
        <h1>Hola soy el Edit (Update) de Empleados</h1>
    @endif
    

    <a href="{{ url('empleados') }}" class="btn btn-primary">Regresar</a>
    <br>
    <br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
        <label class="control-label" for="Nombre">{{'Nombre'}}</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control @error('Nombre') is-invalid @enderror" value="{{ isset($datosEmpleado->Nombre) ? $datosEmpleado->Nombre : old('Nombre') }}">
        @error('Nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    

    <div class="form-group">
        <label class="control-label" for="ApellidoPaterno">{{'ApellidoPaterno'}}</label>
        <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" class="form-control @error('ApellidoPaterno') is-invalid @enderror" value="{{ isset($datosEmpleado->ApellidoPaterno) ? $datosEmpleado->ApellidoPaterno : old('ApellidoPaterno') }}">
        @error('ApellidoPaterno') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label class="control-label" for="ApellidoMaterno">{{'ApellidoMaterno'}}</label>
        <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control @error('ApellidoMaterno') is-invalid @enderror" value="{{ isset($datosEmpleado->ApellidoMaterno) ? $datosEmpleado->ApellidoMaterno : old('ApellidoMaterno') }}">
        @error('ApellidoMaterno') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="form-group hover">
        <label class="control-label" for="Correo">{{'Correo'}}</label>
        <input type="email" name="Correo" id="Correo" class="form-control @error('Correo') is-invalid @enderror" value="{{ isset($datosEmpleado->Correo) ? $datosEmpleado->Correo : old('Correo') }}">
        @error('Correo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="form-group">
        <label class="control-label" for="Foto">{{'Foto'}}</label>

        @if (isset($datosEmpleado->Foto))
            <img src="{{ asset('storage').'/'.$datosEmpleado->Foto }}" alt="" width="100" class="img-thumbnail img-fluid">
        @endif

        <input type="file" name="Foto" id="Foto" class="form-control-file @error('Foto') is-invalid @enderror" value="">
        @error('Foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <input type="submit" class="btn btn-success btn-block" value="{{ $Modo=='crear' ? 'AÑADIR' : 'GUARDAR CAMBIOS' }}">

</div>
@endsection