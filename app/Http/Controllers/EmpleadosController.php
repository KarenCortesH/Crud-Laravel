<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Storage;
class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        /*con esto estamos almacenando toda la informacion 
        pero paginada index=empleados*/

        $datos ['empleados'] = Empleados::paginate(5);
        return view('empleados.index',$datos);
        
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
        /*Con esto hacemos que se almacene toda 
        la informacion que llega al metodo store*/
    // $datosEmpleados=request()->all();
        /*Aqui estamos retornando una respuesta
        de lo que se almaceno en la variable*/
        
        //se coloca asi para que podamos hacer la inserccion en la BD
        $datosEmpleados=request()->except('_token');

        //Recolectar la fotografia
        if($request->hasFile('Foto'))
        {

           /*Lo que estamos haciendo aqui es modificar toda 
            la informacion que estamos recolectando del campo foto
            y lo vamos almacenar en la carpeta uploads que estan en 
            la parte publica. */
            //pone la nueva foto en la carpeta uploads
        $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');

        }
        //insertamos los valores que estamos recibiendo del formulario
        Empleados::insert($datosEmpleados);
        //return response()->json($datosEmpleados);
        //esta linea me va redireccionar despues de haber insertado un registro a index.blade.php
        //return redirect('empleados');
        return redirect('empleados')->with('Mensaje','Empleado Agregado Con Exito');
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
        //devuelve toda la informacion que corresponde a ese id
        $empleado= Empleados::findOrFail($id);
        //compact crea un conjunto de informacion 
        return view('empleados.edit',compact('empleado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    //id  porque por medio de esta se recepciona toda la infomacion por medio del token
    public function update(Request $request, $id)
    {
        //recepcionar la informacion y colocarla en una variable
        $datosEmpleados=request()->except(['_token','_method']);
        if($request->hasFile('Foto'))
        {
        $empleado = Empleados::findOrFail($id);
        //Esta linea lo que hace es borrar la foto antigua
        Storage::delete('public/'.$empleado->Foto);
 

            /*Lo que estamos haciendo aqui es modificar toda 
            la informacion que estamos recolectando del campo foto
            y lo vamos almacenar en la carpeta uploads que estan en 
            la parte publica. */
        $datosEmpleados['Foto']=$request->file('Foto')->store('uploads','public');
        }
        //ejecuto la instruccion where utilizando mis datos recepcionados y se hace un update con esa informacion
        Empleados::where('id','=',$id)->update($datosEmpleados);
        //aqui estan los datos actualizados
        //$empleado = Empleados::findOrFail($id);
        //return view('empleados.edit',compact('empleado'));
        return \redirect('empleados')->with('Mensaje','Empleado Modificado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleados::findOrFail($id);
        //Esta linea lo que hace es borrar la foto antigua
        if(Storage::delete('public/'.$empleado->Foto))
        {
            Empleados::destroy($id);
        }
 

        /*Aqui lo que vamos a borrar el registro empleados
        pasandole el parametro id de la url*/
        Empleados::destroy($id);
        //Aqui estoy diciendole vea redireccioneme nuevamente a la pagina empleados
        return \redirect('empleados')->with('Mensaje','Empleado Eliminado con Exito');
       
        
    }
}
