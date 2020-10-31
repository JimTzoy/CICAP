<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Contratos;
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
        $pagos = Db::table('pagos')->select('id','fechapago', 'cantidad','observacion', 'id_contrato', 'fechainicio', 'fechafin', 'created_at'
)->where('id_contrato','=',$id)->get();
        $contra = Db::table('contratos')->select('fechainicio', 'fechafin')->where('id','=',$id)->get();
        return view('pagos.index', compact('ids'), ['pagos'=>$pagos, 'contra'=>$contra]);
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
        $user_id[] = Auth::user();
        $id_user = $user_id[0]['id'];
        $pago = new Pagos();
        $pago->cantidad = $request->cantidad;
        $pago->fechapago = $request->fechapago;
        $pago->observacion = $request->observacion;
        $pago->fechainicio = $request->fechainicio;
        $pago->fechafin = $request->fechafin;
        $pago->id_contrato = $request->id;
        $pago->save();
        $d = (int)$pago->id;
        $historial = new HistorialPago();
        $historial->id_user = $id_user;
        $historial->id_pago = $d;
        $historial->save();
        $id = $request->id;
        $estatus = "ACTIVO";
        $contrato = Contratos::findOrFail($id);
        $contrato->fechainicio = $request->fechainicio;
        $contrato->fechafin = $request->fechafin;
        $contrato->status = $estatus;
        $contrato->save();
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
    public function show(Pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pagos)
    {
        //
    }
}
