<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contratos;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now()->toDateString();
        $request->user()->authorizeRoles(['user', 'admin','tecnico']);
         $contrato = Db::table('contratos')->join('plans', 'plans.id', '=', 'contratos.plan_id')->join('users','users.id','=','contratos.tecnico_id')->select('contratos.id','contratos.numerocliente','contratos.nombrecompleto',   'contratos.domicilio' ,'contratos.telefono', 'contratos.ipcliente' ,'contratos.ipantena',  'contratos.fechacontrato' , 'contratos.fechainicio',  'contratos.fechafin'  ,'plans.nombre as plan_id', 'contratos.instalacion','plans.precio' ,'users.name as tecnico_id', 'contratos.status', 'contratos.observacion'  ,'contratos.created_at', 'contratos.updated_at')->where('contratos.fechafin','<=',$fecha)->where('contratos.status','=','ACTIVO')->get();
        $pagos = Db::table('ingresos')->where('fecha','=',$fecha)->sum('cantidad');
        $p = Db::table('pagos')->where('fechapago','=',$fecha)->sum('cantidad');
        $f = DB::table('ingresos')->select('fecha')->groupBy('fecha')->get();
        $e = DB::table('ingresos')->groupBy('fecha')->where('tipo','=','Egreso')->selectRaw('TRUNCATE(SUM(cantidad), 2) as o')->get();
        $t = DB::table('ingresos')->groupBy('fecha')->where('tipo','=','Ingreso')->selectRaw('TRUNCATE(SUM(cantidad), 2) as u')->get();
        return view('home',['contrato'=>$contrato,'pagos'=>$pagos,'p'=>$p,'t'=>$t,'f'=>$f,'e'=>$e]);
    }
}
