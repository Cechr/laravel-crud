<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperamos los datos del modelo y lo mandamos paginado en intervalos de 3 registros
        $datosEmpleados['empleados']=Empleados::paginate(3);
        return view('empleados.index', $datosEmpleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Indicamos en el array los atributos que queremos validar
        $attributes=[
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];

        //Indicamos en el array el mensaje que vamos a mostrar cuando el campo esta vacío
        $mesagge=[
            'required'=> 'El campo :attribute es requerido para registrar el nuevo empleado.'
        ];

        //Validamos los datos con la función validate()
        $request->validate($attributes,$mesagge);

        //Recibimos la información del Request por el método POST y excluimos el token
        $datosEmpleado = $request->except('_token');

        //Tratamos la imagen
        if($request->hasFile('Foto')){
            //Modificamos el valor de 'Foto' en el array por el path donde movemos con el metodo store() el archivo original
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        //Hacemos la insercion de los datos
        Empleados::insert($datosEmpleado);

        return redirect('empleados')->with('Mensaje','¡Empleado AGREGADO con ÉXITO!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos y obtenemos los datos del empleado de la BD y la mandamos a la vista correspondiente
        $datosEmpleado= Empleados::findOrFail($id);
        return view('empleados.edit', compact('datosEmpleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Indicamos en el array los atributos que queremos validar
        $attributes=[
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
        ];

        //Si hay foto significa que se quiere actualizar, por se valida
        if($request->hasFile('Foto')){
            $attributes+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg',];
        }

        //Indicamos en el array el mensaje que vamos a mostrar cuando el campo esta vacío
        $mesagge=[
            'required'=> 'El campo :attribute es requerido para registrar el nuevo empleado.'
        ];

        //Validamos los datos con la función validate()
        $request->validate($attributes,$mesagge);
        
        //Recibimos la información del Request por el método POST y excluimos el token
        $datosEmpleadoModificado = $request->except(['_token', '_method']);

        //Tratamos la imagen
        if($request->hasFile('Foto')){
            //Borramos la imagen actual
            $datoEmpleadoActual= Empleados::findOrFail($id);
            Storage::delete('public/'.$datoEmpleadoActual->Foto);

            //Modificamos el valor de 'Foto' en el array por el path donde movemos con el metodo store() el nuevo archivo
            $datosEmpleadoModificado['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Empleados::where('id', '=', $id)->update($datosEmpleadoModificado);

        return redirect('empleados')->with('Mensaje','¡Empleado ACTUALIZADO con ÉXITO!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Borramos la imagen del empleado y si es exitoso pasamos a borrar el registro de la base de datos
        $datoEmpleadoActual= Empleados::findOrFail($id);
        
        if(Storage::delete('public/'.$datoEmpleadoActual->Foto)){
            //Recibimos el id del empleado y ejecutamos el método que elimina el registro en la BD
            Empleados::destroy($id);
        }
   
        return redirect('empleados')->with('Mensaje','¡Empleado BORRADO con ÉXITO!');;
    }
}
