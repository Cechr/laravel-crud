<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;

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
        $datos['empleados']=Empleados::paginate(3);
        return view('empleados.index', $datos);
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
        //Recibimos la información del Request por el método POST y excluimos el token
        $datosEmpleado = $request->except('_token');

        //Tratamos la imagen
        if($request->hasFile('Foto')){
            //Modificamos el valor de 'Foto' en el array por el path donde movemos con el metodo store() el archivo original
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        //Hacemos la insercion de los datos
        Empleados::insert($datosEmpleado);

        return response()->json($datosEmpleado);
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
    public function edit(Empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $empleados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Recibimos el id del empleado y ejecutamos el método que elimina el registro en la BD
        Empleados::destroy($id);

        return redirect('empleados');
    }
}
