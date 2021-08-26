<?php

namespace App\Http\Controllers;

use App\Antena;
use App\Contratos;
use App\Pagos;
use App\HistorialPago;
use App\Ingreso;
use App\Banco;
use Carbon\Carbon;
use App\HistorialContratos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContratosController extends Controller
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
          $nombrecompleto = $request->get('busqueda');
        $contrato = Db::table('contratos')->join('antenas', 'antenas.id','=','contratos.antena_id')->join('plans', 'plans.id', '=', 'contratos.plan_id')->join('users','users.id','=','contratos.tecnico_id')->select('contratos.id','contratos.numerocliente','contratos.nombrecompleto',   'contratos.domicilio' ,'contratos.telefono', 'contratos.ipcliente' ,'contratos.ipantena',  'contratos.fechacontrato' , 'contratos.fechainicio',  'contratos.fechafin'  ,'plans.nombre as plan_id', 'contratos.instalacion','plans.precio', 'antenas.ip as antena_id' ,'users.name as tecnico_id', 'contratos.status', 'contratos.observacion'  ,'contratos.created_at', 'contratos.updated_at')->where('nombrecompleto','like', "%$nombrecompleto%")->orderBy('contratos.numerocliente','ASC')->paginate(10);

        return view('contratos.index',['contrato'=>$contrato]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $planes = Db::table('plans')->select('id','nombre', 'megas','precio')->get();
        $precioplan = Db::table('plans')->select('precio')->get();
        $antenas = Db::table('antenas')->select('id','ip')->where('stantena','=','0')->get();
        return view('contratos.create',['planes'=>$planes, 'antenas'=>$antenas, 'precioplan'=>$precioplan]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registrar(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $planes = Db::table('plans')->select('id','nombre', 'megas','precio')->get();
        $precioplan = Db::table('plans')->select('precio')->get();
        $antenas = Db::table('antenas')->select('id','ip')->where('stantena','=','0')->get();
        return view('contratos.registrar',['planes'=>$planes, 'antenas'=>$antenas, 'precioplan'=>$precioplan]);
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
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $estado = "ACTIVO";
        $contrato = new Contratos();
        $contrato->numerocliente = $request->numerocliente;
        $contrato->nombrecompleto = $request->nombrecompleto;
        $contrato->domicilio = $request->domicilio;
        $contrato->telefono = $request->telefono;
        $contrato->ipcliente = $request->ipcliente;
        $contrato->ipantena = $request->ipantena;
        $contrato->fechacontrato = $request->fechacontrato;
        $contrato->fechainicio = $request->fechainicio;
        $contrato->fechafin = $request->fechafin;
        $contrato->instalacion = $request->instalacion;
        $contrato->plan_id = $request->plan_id;
        $contrato->antena_id = $request->antena_id;
        $contrato->tecnico_id = $id_user;
        $contrato->status = $estado;
        $contrato->observacion = $request->observacion;
        $contrato->save();
        $d = (int)$contrato->id;
        $accion = "REGISTRADO";
        $historial = new HistorialContratos();
        $historial->id_user = $id_user;
        $historial->id_contratos = $d;
        $historial->accion = $accion;
        $historial->save();
        $o = "POR CONCEPTO DE INSTALACIÓN, CONFIGURACIÓN, RENTA DE EQUIPO Y PRIMERA MENSUALIDAD ".$request->observacion;
        $p = "Ingreso";
        $h = $request->instalacion;
        $j = $request->cantidad;
        $sumahj = $h + $j;
        $id = '5';
        $capitalb = Banco::where('id','=',$id)->value('cantidad');
        $capitala = $capitalb + $sumahj;
        $ingreso = new Ingreso();
        $ingreso->cantidad = $sumahj;
        $ingreso->descripcion = $o;
        $ingreso->tipo = $p;
        $ingreso->fecha = $request->fechacontrato;
        $ingreso->id_user = $id_user;
        $ingreso->idbanco = $id;
        $ingreso->save();
        $banco = Banco::findOrFail($id);
        $banco->cantidad = $capitala;
        $banco->save();
        $pago = new Pagos();
        $pago->cantidad = $sumahj;
        $pago->fechapago = $request->fechacontrato;
        $pago->observacion = $o;
        $pago->fechainicio = $request->fechainicio;
        $pago->fechafin = $request->fechafin;
        $pago->id_contrato = $d;
        $pago->save();
        $a = (int)$pago->id;
        $accionp = "REGISTRO";
        $historialp = new HistorialPago();
        $historialp->id_user = $id_user;
        $historialp->id_pago = $a;
        $historialp->accion = $accionp;
        $historialp->save();
        $antena = Antena::findOrFail($request->antena_id);
        $antena->stantena = 1;
        $antena->save();
        if ($contrato == null) {
             $notification = array(
                    'message' => 'ERROR. El contrato no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Contrato registrado', 
                    'alert-type' => 'success'  );
         return redirect()->action('ContratosController@formatoA', [$a])->with($notification);
        }


    }
     /**
     * registrar newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function registrarcontrato(Request $request)
    {
        $request->user()->authorizeRoles(['admin','tecnico']);
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $estado = "ACTIVO";
        $contrato = new Contratos();
        $contrato->numerocliente = $request->numerocliente;
        $contrato->nombrecompleto = $request->nombrecompleto;
        $contrato->domicilio = $request->domicilio;
        $contrato->telefono = $request->telefono;
        $contrato->ipcliente = $request->ipcliente;
        $contrato->ipantena = $request->ipantena;
        $contrato->fechacontrato = $request->fechacontrato;
        $contrato->fechainicio = $request->fechainicio;
        $contrato->fechafin = $request->fechafin;
        $contrato->instalacion = $request->instalacion;
        $contrato->plan_id = $request->plan_id;
        $contrato->antena_id = $request->antena_id;
        $contrato->tecnico_id = $id_user;
        $contrato->status = $estado;
        $contrato->observacion = $request->observacion;
        $contrato->save();
        $d = (int)$contrato->id;
        $accion = "REGISTRADO";
        $historial = new HistorialContratos();
        $historial->id_user = $id_user;
        $historial->id_contratos = $d;
        $historial->accion = $accion;
        $historial->save();
        $antena = Antena::findOrFail($request->antena_id);
        $antena->stantena = 1;
        $antena->save();
        if ($contrato == null) {
             $notification = array(
                    'message' => 'ERROR. El contrato no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Contrato registrado', 
                    'alert-type' => 'success'  );
         return redirect()->action('ContratosController@index')->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
         setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $contra = Db::table('contratos')->join('antenas', 'antenas.id','=','contratos.antena_id')->join('plans', 'plans.id', '=', 'contratos.plan_id')->join('users','users.id','=','contratos.tecnico_id')->select('plans.nombre as plan_id','plans.precio', 'antenas.modelo' ,'users.name as tecnico_id')->where('contratos.id','=',$id)->get();
        $contrato =  Contratos::find($id);
        return view('contratos.show',compact('contrato'),['contra'=>$contra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planes = Db::table('plans')->select('id','nombre', 'megas','precio')->get();
        $precioplan = Db::table('plans')->select('precio')->get();
        $antenas = Db::table('antenas')->select('id','ip')->get();
       $contrato =  Contratos::find($id);
        return view('contratos.edit',compact('contrato'),['planes'=>$planes, 'antenas'=>$antenas, 'precioplan'=>$precioplan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $updates = Contratos::find($id)->update($request->all());
        if ($updates == TRUE) {
            $accion = "ACTUALIZADO";
            $historial = new HistorialContratos();
            $historial->id_user = $id_user;
            $historial->id_contratos = $id;
            $historial->accion = $accion;
            $historial->save();
            $notification = array(
                'message' => 'CONTRATO ACTUALIZADO EXITOSAMENTE', 
                'alert-type' => 'success');
         return redirect()->action('ContratosController@show', [$id])->with($notification);  
        }else{
            $notification = array(
                'message' => 'NADA ACTUALIZADO', 
                'alert-type' => 'success');
            return redirect()->action('ContratosController@show', [$id])->with($notification);  
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contratos::find($id)->delete();
            $notification = array(
                'message' => 'CONTRATO ELIMINADO EXITOSAMENTE', 
                'alert-type' => 'success');
            return redirect()->action('ContratosController@index')->with($notification);

    }
    /**
     * FUNCION QUE SIRVE PARA PASAR AL ESTADO COMO SUSPENDIDO
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function suspender($id){
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $estatus = "SUSPENDIDO";
        $contrato = Contratos::findOrFail($id);
        $contrato->status = $estatus;
        $contrato->save();
        $historial = new HistorialContratos();
            $historial->id_user = $id_user;
            $historial->id_contratos = $id;
            $historial->accion = $estatus;
            $historial->save();
        if ($contrato == null) {
             $notification = array(
                    'message' => 'ERROR. El contrato no se ha suspendido', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Se a actualizado el estatus', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

    }
    public function regalo($id){
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $estatus = "REGALO";
        $contrato = Contratos::findOrFail($id);
        $contrato->status = $estatus;
        $contrato->save();
        $historial = new HistorialContratos();
            $historial->id_user = $id_user;
            $historial->id_contratos = $id;
            $historial->accion = $estatus;
            $historial->save();
        if ($contrato == null) {
             $notification = array(
                    'message' => 'ERROR. El contrato no se ha suspendido', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Se a actualizado el estatus', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

    }
    public function cancelar($id){
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $estatus = "CANCELADO";
        $contrato = Contratos::findOrFail($id);
        $contrato->status = $estatus;
        $contrato->save();
        $historial = new HistorialContratos();
            $historial->id_user = $id_user;
            $historial->id_contratos = $id;
            $historial->accion = $estatus;
            $historial->save();
        if ($contrato == null) {
             $notification = array(
                    'message' => 'ERROR. El contrato no se ha suspendido', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Se a actualizado el estatus', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

    }
    /**
     * FUNCION QUE MUESTRA UNA VISTA DEL CONTRATO QUE SE LE ENTREGA A  LOS CLIENTES 
     */
    public function formato(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $pagos = Db::table('pagos')->select('fechapago', 'cantidad','observacion', 'fechainicio', 'fechafin')->where('id','=',$id)->get();
        $ids = $id;
        $tablapagos[] =Pagos::where('id','=',$id)->first();
        $idcontratos = $tablapagos[0]['id_contrato'];
        $contra = Db::table('contratos')->join('plans','plans.id','=','contratos.plan_id')->select('contratos.nombrecompleto','plans.nombre')->where('contratos.id','=',$idcontratos)->get();
        return view('contratos.formato',compact('ids'), ['contra'=>$contra, 'pagos'=>$pagos]);
    }
    public function RECIBO_PAGO_INTERNET(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $pagos = Db::table('pagos')->select('fechapago', 'cantidad','observacion', 'fechainicio', 'fechafin')->where('id','=',$id)->get();
        $tablapagos[] =Pagos::where('id','=',$id)->first();
        $idcontratos = $tablapagos[0]['id_contrato'];
        $contra = Db::table('contratos')->join('plans','plans.id','=','contratos.plan_id')->select('contratos.nombrecompleto','plans.nombre')->where('contratos.id','=',$idcontratos)->get();
        return view('contratos.RECIBO_PAGO_INTERNET', compact('contra'), ['pagos'=>$pagos]);
    }
      public function imprimir(Request $request, $id){
            setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $pagos = Db::table('pagos')->select('fechapago', 'cantidad','observacion', 'fechainicio', 'fechafin')->where('id','=',$id)->get();
        $tablapagos[] =Pagos::where('id','=',$id)->first();
        $idcontratos = $tablapagos[0]['id_contrato'];
        $contra = Db::table('contratos')->join('plans','plans.id','=','contratos.plan_id')->select('contratos.nombrecompleto','plans.nombre')->where('contratos.id','=',$idcontratos)->get();
        $pdf = \PDF::loadView('contratos.RECIBO_PAGO_INTERNET', compact('contra'), ['pagos'=>$pagos]);
    
        return $pdf->download('RECIBO_PAGO_INTERNET'.'.pdf');
    }
    /**
     * FUNCION QUE MUESTRA EL FORMATO DE PAGO EN LA INSTALACION DEL SERVICIO
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function formatoA(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $pagos = Db::table('pagos')->select('fechapago', 'cantidad','observacion', 'fechainicio', 'fechafin')->where('id','=',$id)->get();
        $ids = $id;
        $tablapagos[] =Pagos::where('id','=',$id)->first();
        $idcontratos = $tablapagos[0]['id_contrato'];
        $contra = Db::table('contratos')->join('plans','plans.id','=','contratos.plan_id')->select('contratos.nombrecompleto','plans.nombre','contratos.domicilio','contratos.telefono')->where('contratos.id','=',$idcontratos)->get();
        return view('contratos.formatoA',compact('ids'), ['contra'=>$contra, 'pagos'=>$pagos]);
    }

        public function CONTRATO_DE_INTERNET(Request $request, $id){
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $pagos = Db::table('pagos')->select('fechapago', 'cantidad','observacion', 'fechainicio', 'fechafin')->where('id','=',$id)->get();
        $tablapagos[] =Pagos::where('id','=',$id)->first();
        $idcontratos = $tablapagos[0]['id_contrato'];
        $contra = Db::table('contratos')->join('plans','plans.id','=','contratos.plan_id')->select('contratos.nombrecompleto','plans.nombre','contratos.domicilio','contratos.telefono')->where('contratos.id','=',$idcontratos)->get();
        return view('contratos.CONTRATO_DE_INTERNET', compact('contra'), ['pagos'=>$pagos]);
    }
          public function enviar(Request $request, $id){
            setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es');
        $request->user()->authorizeRoles(['admin']);
        $pagos = Db::table('pagos')->select('fechapago', 'cantidad','observacion', 'fechainicio', 'fechafin')->where('id','=',$id)->get();
        $tablapagos[] =Pagos::where('id','=',$id)->first();
        $idcontratos = $tablapagos[0]['id_contrato'];
        $contra = Db::table('contratos')->join('plans','plans.id','=','contratos.plan_id')->select('contratos.nombrecompleto','plans.nombre','contratos.domicilio','contratos.telefono')->where('contratos.id','=',$idcontratos)->get();
        $pdf = \PDF::loadView('contratos.CONTRATO_DE_INTERNET', compact('contra'), ['pagos'=>$pagos]);
    
        return $pdf->download('CONTRATO_DE_INTERNET'.'.pdf');
    }
public function buscar($busqueda)
{
    $resultado = Contratos::where("nombrecompleto", "LIKE", "%{$busqueda}%");
      return view('contratos.buscar',['resultado'=>$resultado]);
}
 
public function resultado()
{
  return view('contratos.resultado');
}

}
