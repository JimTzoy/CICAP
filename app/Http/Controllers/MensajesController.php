<?php

namespace App\Http\Controllers;

use App\Mensajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $mensaje = Db::table('mensajes')->select('id','nombre', 'telefono','correo','created_at')->get();
        return view('mensajes.index', ['mensaje' => $mensaje]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensaje = new Mensajes();
        $mensaje->nombre = $request->nombre;
        $mensaje->telefono = $request->telefono;
        $mensaje->correo = $request->correo;
        $mensaje->mensaje = $request->mensaje;
        $mensaje->save();
        if ($mensaje == null) {
             $notification = array(
                    'message' => 'ERROR. EL MENSAJE NO SE HA ENVIADO', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. El MENSAJE SE HA ENVIADO', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensajes  $mensajes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $mensaje =  Mensajes::find($id);
        return view('mensajes.show',compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensajes  $mensajes
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensajes $mensajes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensajes  $mensajes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensajes $mensajes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensajes  $mensajes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mensajes::find($id)->delete();
            $notification = array(
                'message' => 'MENSAJE ELIMINADO EXITOSAMENTE', 
                'alert-type' => 'success');
            return redirect()->action('MensajesController@index')->with($notification);

    }
}
