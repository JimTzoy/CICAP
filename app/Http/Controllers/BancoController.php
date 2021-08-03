<?php

namespace App\Http\Controllers;

use App\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BancoController extends Controller
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
            $banco = Db::table('banco')->select('id','nbanco','cantidad','updated_at')->get();
            $capital = DB::table('banco')->get()->sum('cantidad');
          return view('bancos.index',['banco'=>$banco,'capital'=>$capital]);
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
        $request->user()->authorizeRoles(['admin','tecnico']);
            $b = new Banco();
            $b->nbanco = $request->nbanco;
            $b->cantidad = $request->cantidad;
            $b->save();
            if ($b == null) {
                 $notification = array(
                        'message' => 'ERROR.', 
                        'alert-type' => 'error'  );
                  return back()->with($notification);
            }else{
             $notification = array(
                        'message' => 'EXITO.', 
                        'alert-type' => 'success'  );
             return redirect()->action('BancoController@index')->with($notification);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->join('banco','banco.id','=','ingresos.idbanco')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name','banco.nbanco')->orderBy('ingresos.created_at','DESC')->where('banco.id','=',$id)->get();
        $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->where('idbanco','=',$id)->sum('cantidad');
        $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->where('idbanco','=',$id)->sum('cantidad');
        $totalcapital = $positivo -$negativo;
        return view('bancos.show',compact('id'),['ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo,'totalcapital'=>$totalcapital]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function edit(Banco $banco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banco $banco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banco $banco)
    {
        //
    }
    /*
    * Display the specified resource.
    *
    * @param  \App\Banco  $banco
    * @return \Illuminate\Http\Response
    */
   public function consultar(Request $request)
   {
       $request->user()->authorizeRoles(['admin']);
       $fechauno = $request->fechainicio;
        $fechados = $request->fechafin;
        $id = $request->id;
       $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->join('banco','banco.id','=','ingresos.idbanco')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name','banco.nbanco')->orderBy('ingresos.created_at','DESC')->where('banco.id','=',$id)->where('ingresos.fecha','>=',$fechauno)->where('ingresos.fecha','<=',$fechados)->get();
       $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->where('idbanco','=',$id)->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
       $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->where('idbanco','=',$id)->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
       $totalcapital = $positivo -$negativo;
       return view('bancos.consultar',['ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo,'totalcapital'=>$totalcapital]);
   }
}
