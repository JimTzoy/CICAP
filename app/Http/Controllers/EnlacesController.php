<?php

namespace App\Http\Controllers;

use App\Enlaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EnlacesController extends Controller
{
    /**
     * [__construct description]
     * Iinicializamos 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $request->user()->authorizeRoles(['admin']);
        $enlace = Db::table('enlaces')->select( 'id', 'ip','nombre','frecuencia','canal','user','pass','ubicacion','modo','tipo','modelo','intensidad','tx','rx','eirp','distancia','conectadoa','password', 'created_at')->get();
        return view('enlaces.index', ['enlace' =>$enlace]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $request->user()->authorizeRoles(['admin']);
         return view('enlaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->user()->authorizeRoles(['admin','tecnico']);
         $antena = new Enlaces();
         $antena->ip = $request->ip;
         $antena->nombre = $request->nombre;
         $antena->frecuencia = $request->frecuencia;
         $antena->canal = $request->canal;
         $antena->user = $request->user;
         $antena->pass = $request->pass;
         $antena->ubicacion = $request->ubicacion;
         $antena->modo = $request->modo;
         $antena->tipo = $request->tipo;
         $antena->modelo = $request->modelo;
         $antena->intensidad = $request->intensidad;
         $antena->tx = $request->tx;
         $antena->rx = $request->rx;
         $antena->eirp = $request->eirp;
         $antena->distancia = $request->distancia;
         $antena->conectadoa = $request->conectadoa;
         $antena->password = $request->password;
         $antena->save();
         if ($antena == null) {
             $notification = array(
                    'message' => 'ERROR. El antena no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Antena registrada', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enlaces  $enlaces
     * @return \Illuminate\Http\Response
     */
    public function show(Enlaces $enlaces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enlaces  $enlaces
     * @return \Illuminate\Http\Response
     */
    public function edit(Enlaces $enlaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enlaces  $enlaces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enlaces $enlaces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enlaces  $enlaces
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enlaces $enlaces)
    {
        //
    }
}
