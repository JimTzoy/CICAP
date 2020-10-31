<?php

namespace App\Http\Controllers;

use App\Antena;
use App\HistorialAntenas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AntenaController extends Controller
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
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $antena = Db::table('antenas')->join('contratos', 'contratos.antena_id', '=', 'antenas.id')->select('antenas.id','antenas.ip','antenas.nombre','antenas.frecuencia','antenas.canal','antenas.user'  ,'antenas.pass','antenas.ubicacion','antenas.tipo','antenas.modelo','antenas.intensidad','antenas.umbralruido','antenas.ccq','antenas.tx','antenas.rx','antenas.calidad','antenas.capacidad','antenas.conectadoa', 'antenas.created_at','contratos.status')->get();
        return view('antenas.index', ['antena' => $antena]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('antenas.create');
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
         $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
         $antena = new Antena();
         $antena->ip = $request->ip;
         $antena->nombre = $request->nombre;
         $antena->frecuencia = $request->frecuencia;
         $antena->canal = $request->canal;
         $antena->user = $request->user;
         $antena->pass = $request->pass;
         $antena->ubicacion = $request->ubicacion;
         $antena->tipo = $request->tipo;
         $antena->modelo = $request->modelo;
         $antena->intensidad = $request->intensidad;
         $antena->umbralruido = $request->umbralruido;
         $antena->ccq = $request->ccq;
         $antena->tx = $request->tx;
         $antena->rx = $request->rx;
         $antena->calidad = $request->calidad;
         $antena->capacidad = $request->capacidad;
         $antena->conectadoa = $request->conectadoa;
         $antena->save();
        $d = (int)$antena->id;
        $historial = new HistorialAntenas();
        $historial->id_user = $id_user;
        $historial->id_antenas = $d;
        $historial->save();
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
     * @param  \App\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function show(Antena $antena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       $plan = Antena::find($id);
        return view('antenas.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Antena::find($id)->update($request->all());
        $notification = array(
                'message' => 'PLAN ACTUALIZADO EXITOSAMENTE', 
                'alert-type' => 'success');
         return redirect()->action('AntenaController@show',[$id])->with($notification);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antena  $antena
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antena $antena)
    {
        //
    }
}
