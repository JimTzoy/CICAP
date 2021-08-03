<?php

namespace App\Http\Controllers;

use App\Ingreso;
use App\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IngresoController extends Controller
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
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now()->toDateString();
        $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->join('banco','banco.id','=','ingresos.idbanco')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name','banco.nbanco')->orderBy('ingresos.created_at','DESC')->paginate(10);
        $aztecaingreso = Db::table('ingresos')->where('idbanco','=','1')->where('tipo','=','Ingreso')->sum('cantidad');
        $aztecaegreso = Db::table('ingresos')->where('idbanco','=','1')->where('tipo','=','Egreso')->sum('cantidad');
        $bbvaingreso = Db::table('ingresos')->where('idbanco','=','2')->where('tipo','=','Ingreso')->sum('cantidad');
        $bbvaegreso = Db::table('ingresos')->where('idbanco','=','2')->where('tipo','=','Egreso')->sum('cantidad');
        $coppelingreso = Db::table('ingresos')->where('idbanco','=','4')->where('tipo','=','Ingreso')->sum('cantidad');
        $coppelegreso = Db::table('ingresos')->where('idbanco','=','4')->where('tipo','=','Egreso')->sum('cantidad');
        $tehuipangoingreso = Db::table('ingresos')->where('idbanco','=','5')->where('tipo','=','Ingreso')->sum('cantidad');
        $tehuipangoegreso = Db::table('ingresos')->where('idbanco','=','5')->where('tipo','=','Egreso')->sum('cantidad');
        $efectivoingreso = Db::table('ingresos')->where('idbanco','=','6')->where('tipo','=','Ingreso')->sum('cantidad');
        $efectivoegreso = Db::table('ingresos')->where('idbanco','=','6')->where('tipo','=','Egreso')->sum('cantidad');
        $ciberingreso = Db::table('ingresos')->where('idbanco','=','7')->where('tipo','=','Ingreso')->sum('cantidad');
        $ciberegreso = Db::table('ingresos')->where('idbanco','=','7')->where('tipo','=','Egreso')->sum('cantidad');
        
        $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->sum('cantidad');
        $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->sum('cantidad');
      return view('ingresos.index',compact('aztecaingreso','aztecaegreso','bbvaingreso','bbvaegreso','coppelingreso','coppelegreso','tehuipangoingreso','tehuipangoegreso','efectivoingreso','efectivoegreso','ciberingreso','ciberegreso'),['ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banco = Db::table('banco')->select('id','nbanco')->get();

        return view('ingresos.create',['banco'=>$banco]);
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
        $id = $request['idbanco'];
        $capitalb = Banco::where('id','=',$id)->value('cantidad');
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $imagen = $request['img'];
        $tipopago = $request['tipo'];
        $cantidada = $request['cantidad'];
        if($tipopago ==  "Ingreso"){
            $totalcapital = $capitalb + $cantidada;
        }else{
            $totalcapital = $capitalb - $cantidada;
        }
        if($imagen == null){
            $ingreso = new Ingreso();
            $ingreso->cantidad = $request->cantidad;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->tipo = $request->tipo;
            $ingreso->fecha = $request->fecha;
            $ingreso->id_user = $id_user;
            $ingreso->idbanco = $request->idbanco;
            $ingreso->save();
            $banco = Banco::findOrFail($id);
            $banco->cantidad = $totalcapital;
            $banco->save();
            if ($ingreso == null) {
                 $notification = array(
                        'message' => 'ERROR.', 
                        'alert-type' => 'error'  );
                  return back()->with($notification);
            }else{
             $notification = array(
                        'message' => 'EXITO.', 
                        'alert-type' => 'success'  );
             return redirect()->action('IngresoController@index')->with($notification);
            }
        }else{
                $tipo = $request['tipo'];
            $nombre = time().$imagen->getClientOriginalName();
            //$imagen->move(public_path().'/img/perfil/',$nombre);
            if($tipo == 'Ingreso'){
                $imagen->move('img/i', $nombre);
            }else{
                $imagen->move('img/e', $nombre);
            }
            $ingreso = new Ingreso();
            $ingreso->cantidad = $request->cantidad;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->tipo = $request->tipo;
            $ingreso->fecha = $request->fecha;
            $ingreso->img = $nombre;
            $ingreso->id_user = $id_user;
            $ingreso->idbanco = $request->idbanco;
            $ingreso->save();
            $banco = Banco::findOrFail($id);
            $banco->cantidad = $totalcapital;
            $banco->save();
            if ($ingreso == null) {
                $notification = array(
                        'message' => 'ERROR.', 
                        'alert-type' => 'error'  );
                return back()->with($notification);
            }else{
            $notification = array(
                        'message' => 'EXITO.', 
                        'alert-type' => 'success'  );
            return redirect()->action('IngresoController@index')->with($notification);
            }

        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        //
    }
    public function buscar(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $fechauno = $request->fechainicio;
        $fechados = $request->fechafin;
        $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name')->where('ingresos.fecha','>=',$fechauno)->where('ingresos.fecha','<=',$fechados)->paginate(10);
        $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        

        return view('ingresos.buscar',['fechauno'=>$fechauno,'fechados'=>$fechados,'ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        //
    }
    /**
     * IMPRIMIR RESUMEN DE LA BUSQUEDA POR FECHAS
     */
    public function formatoc(Request $request, $fechauno,$fechados){    
        $request->user()->authorizeRoles(['admin']);
        $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name')->where('ingresos.fecha','>=',$fechauno)->where('ingresos.fecha','<=',$fechados)->paginate(10);
        $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $total = $positivo - $negativo;

        return view('ingresos.formatoc',compact('total'),['fechauno'=>$fechauno,'fechados'=>$fechados,'ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo]);
   
    }
    public function RESUMEN(Request $request, $fechauno,$fechados){    
        $request->user()->authorizeRoles(['admin']);
        $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name')->where('ingresos.fecha','>=',$fechauno)->where('ingresos.fecha','<=',$fechados)->paginate(10);
        $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $total = $positivo - $negativo;

        return view('ingresos.RESUMEN',compact('total'),['fechauno'=>$fechauno,'fechados'=>$fechados,'ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo]);
   
    }
    public function imprimirresumen(Request $request, $fechauno,$fechados){
        $request->user()->authorizeRoles(['admin']);
        $request->user()->authorizeRoles(['admin']);
        $ingreso = Db::table('ingresos')->join('users','users.id','=','ingresos.id_user')->select('ingresos.id','ingresos.cantidad','ingresos.descripcion','ingresos.tipo','ingresos.fecha' ,'users.name')->where('ingresos.fecha','>=',$fechauno)->where('ingresos.fecha','<=',$fechados)->paginate(10);
        $positivo = Db::table('ingresos')->where('tipo','=','Ingreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $negativo = Db::table('ingresos')->where('tipo','=','Egreso')->where('fecha','>=',$fechauno)->where('fecha','<=',$fechados)->sum('cantidad');
        $total = $positivo - $negativo;
        $pdf = \PDF::loadView('ingresos.RESUMEN', compact('total'),['fechauno'=>$fechauno,'fechados'=>$fechados,'ingreso'=>$ingreso,'positivo'=>$positivo,'negativo'=>$negativo]);
    
        return $pdf->download('RESUMEN'.'.pdf');
    }
}
