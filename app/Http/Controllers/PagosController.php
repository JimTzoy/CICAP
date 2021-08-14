<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Banco;
use App\Contratos;
use Carbon\Carbon;
use App\Ingreso;
use App\HistorialPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller
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
    public function index(Request $request, $id)
    {
         $request->user()->authorizeRoles(['admin']);
         $ids = $id;
        $pagos = Db::table('pagos')->join('banco','banco.id','=','pagos.idbanco')->select('pagos.id','pagos.fechapago', 'pagos.cantidad','pagos.observacion', 'pagos.id_contrato', 'pagos.fechainicio', 'pagos.fechafin', 'pagos.created_at','banco.nbanco')->where('pagos.id_contrato','=',$id)->get();
        $contra = Db::table('contratos')->select('fechainicio', 'fechafin')->where('id','=',$id)->get();
        $banco = Db::table('banco')->select('id','nbanco')->get();
        return view('pagos.index', compact('ids'), ['pagos'=>$pagos, 'contra'=>$contra,'banco'=>$banco]);
    }
    /**
     * [historial description]
     * @param  Request $request [description]
     * @return [type]           [description]
     *     public function historial(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now()->toDateString();
        $hora =  $carbon->now()->toTimeString();  
        $pagos = Db::table('pagos')->join('users','users.id','=','pagos.id_user')->select(Db::raw('SUM(pagos.cantidad) as cantidad'),'users.name','users.id as id_user','pagos.fechapago')->where('fechapago','=',$fecha)->groupBy('id_user')->get();
    
        return view('pagos.historial', ['pagos'=>$pagos]);
    }
     */
    public function history(Request $request)
    {
         $request->user()->authorizeRoles(['admin']);
         $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now()->toDateString();
        $pagos = Db::table('pagos')->join('users','users.id','=','pagos.id_user')->join('banco','banco.id','=','pagos.idbanco')->join('contratos','contratos.id','=','pagos.id_contrato')->select('pagos.id','pagos.fechapago', 'pagos.cantidad','pagos.observacion', 'contratos.nombrecompleto', 'pagos.fechainicio', 'pagos.fechafin', 'pagos.created_at','banco.nbanco','users.name')->where('pagos.fechapago','=',$fecha)->get();
        
        $banco = Db::table('banco')->select('id','nbanco')->get();
        return view('pagos.history', ['pagos'=>$pagos,'banco'=>$banco]);
    }
    public function historial(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $carbon = new \Carbon\Carbon();
        $fecha = $carbon->now()->toDateString();
        $hora =  $carbon->now()->toTimeString();  
        $pagos = Db::table('pagos')->join('users','users.id','=','pagos.id_user')->select('pagos.cantidad','users.name','users.id as id_user','pagos.fechapago')->get();
    
        return view('pagos.historial', ['pagos'=>$pagos]);
    }
    public function detalles(Request $request, $id_user){
        $request->user()->authorizeRoles(['admin']);
        $fechainicio = $request->get('fechainicio');
        $pagos = Db::table('pagos')->join('contratos','contratos.id','=','pagos.id_contrato')->join('users','users.id','=','pagos.id_user')->select('pagos.id','contratos.nombrecompleto','pagos.cantidad','pagos.fechapago')->where('pagos.id_user','=',$id_user,'pagos.fechapago','=',$fechainicio)->paginate(10);

        $total = Db::table('pagos')->join('contratos','contratos.id','=','pagos.id_contrato')->join('users','users.id','=','pagos.id_user')->where('pagos.id_user','=',$id_user)->orWhere('pagos.fechapago','=',$fechainicio)->sum('pagos.cantidad');
         
        return view('pagos.detalles',compact('total'), ['pagos'=>$pagos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $id = $request['idbanco'];
        $capitalb = Banco::where('id','=',$id)->value('cantidad');
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $cantidada = $request['cantidad'];
        $totalcapital = $capitalb + $cantidada;

        $pago = new Pagos();
        $pago->cantidad = $request->cantidad;
        $pago->fechapago = $request->fechapago;
        $pago->observacion = $request->observacion;
        $pago->fechainicio = $request->fechainicio;
        $pago->fechafin = $request->fechafin;
        $pago->id_contrato = $request->id;
        $pago->id_user = $id_user;
        $pago->idbanco = $request->idbanco;
        $pago->save();
        $d = (int)$pago->id;
        $historial = new HistorialPago();
        $historial->id_user = $id_user;
        $historial->id_pago = $d;
        $historial->accion = "REGISTRO";
        $historial->save();
        $idc = $request->id;
        $estatus = "ACTIVO";
        $ncontrato = Contratos::where('id','=',$idc)->value('nombrecompleto');
        $h = $request->observacion;
        $des = $h." de ".$ncontrato;
        $contrato = Contratos::findOrFail($idc);
        $contrato->fechainicio = $request->fechainicio;
        $contrato->fechafin = $request->fechafin;
        $contrato->status = $estatus;
        $contrato->save();
        $banco = Banco::findOrFail($id);
        $banco->cantidad = $totalcapital;
        $banco->save();
        $p = "Ingreso";
        $ingreso = new Ingreso();
        $ingreso->cantidad = $request->cantidad;
        $ingreso->descripcion = $des;
        $ingreso->tipo = $p;
        $ingreso->fecha = $request->fechapago;
        $ingreso->id_user = $id_user;
        $ingreso->idbanco = $id;
        $ingreso->save();
        
        if ($pago == null) {
             $notification = array(
                    'message' => 'ERROR. El pago no se guardo', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Pago guardado con exito', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos = Pagos::find($id);
        return view('pagos.show',compact('pagos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
    
    public function edit($id)
    {
       $pago = Pagos::find($id);
       return view('pagos.edit',compact('pago'));
    }

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     
    public function update(Request $request, $id)
    {
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $idcontrato = Pagos::where('id','=',$id)->get();
        $idc = $idcontrato[0]['id_contrato'];
        $updates = Pagos::find($id)->update($request->all());
        if ($updates == TRUE) {
            $accion = "ACTUALIZADO";
            $historial = new HistorialContratos();
            $historial->id_user = $id_user;
            $historial->id_contratos = $id;
            $historial->accion = $accion;
            $historial->save();
            $contrato = Contratos::findOrFail($idc);
            $contrato->fechainicio = $request->fechainicio;
            $contrato->fechafin = $request->fechafin;
            $contrato->save();
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
    **/
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pagos::find($id)->delete();
        $notification = array(
            'message' => 'PAGO ELIMINADO EXITOSAMENTE', 
            'alert-type' => 'success');
        return back()->with($notification);
    }
}
