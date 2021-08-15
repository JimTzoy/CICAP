<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use Illuminate\Support\Facades\Auth;
use App\Ingreso;
use Illuminate\Support\Facades\DB;
use \RouterOS\Client;
use \RouterOS\Query;
class CiberController extends Controller
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
    public function index()
    {
        $banco = Db::table('banco')->select('id','nbanco')->get();
        return View('cibers.index',['banco'=>$banco]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


// Initiate client with config object
$client = new Client([
    'host' => '192.168.200.1',
    'user' => 'admin',
    'pass' => '021697',
    'port' => 8728,
]);

// Create "where" Query object for RouterOS
$query =(new Query('/ip/hotspot/ip-binding/print'));

// Send query and read response from RouterOS
$response = $client->query($query)->read();

var_dump($response);
 return view('cibers.create');
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
        $ida = $request['ebanco'];
        $idb = $request['idbanco'];
        $capitala = Banco::where('id','=',$ida)->value('cantidad');
        $capitalb = Banco::where('id','=',$idb)->value('cantidad');
        $userid[] = Auth::user();
        $id_user = $userid[0]['id'];
        $imagen = $request['img'];
        $cantidada = $request['cantidad'];
        $totalcapitala = $capitala - $cantidada;

        $totalcapitalb = $capitalb + $cantidada;

        if($imagen == null){
            $ingreso = new Ingreso();
            $ingreso->cantidad = $request->cantidad;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->tipo = "Egreso";
            $ingreso->fecha = $request->fecha;
            $ingreso->id_user = $id_user;
            $ingreso->idbanco = $request->ebanco;
            $ingreso->save();
            $banco = Banco::findOrFail($ida);
            $banco->cantidad = $totalcapitala;
            $banco->save();
            $ingreso = new Ingreso();
            $ingreso->cantidad = $request->cantidad;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->tipo = "Ingreso";
            $ingreso->fecha = $request->fecha;
            $ingreso->id_user = $id_user;
            $ingreso->idbanco = $request->idbanco;
            $ingreso->save();
            $banco = Banco::findOrFail($idb);
            $banco->cantidad = $totalcapitalb;
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
               
            $nombre = time().$imagen->getClientOriginalName();
            //$imagen->move(public_path().'/img/perfil/',$nombre);
                $imagen->move('img/tiket', $nombre);

            $ingreso = new Ingreso();
            $ingreso->cantidad = $request->cantidad;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->tipo = "Egreso";
            $ingreso->img = $nombre;
            $ingreso->fecha = $request->fecha;
            $ingreso->id_user = $id_user;
            $ingreso->idbanco = $request->ebanco;
            $ingreso->save();
            $banco = Banco::findOrFail($ida);
            $banco->cantidad = $totalcapitala;
            $banco->save();
            $ingreso = new Ingreso();
            $ingreso->cantidad = $request->cantidad;
            $ingreso->descripcion = $request->descripcion;
            $ingreso->tipo = "Ingreso";
            $ingreso->img = $nombre;
            $ingreso->fecha = $request->fecha;
            $ingreso->id_user = $id_user;
            $ingreso->idbanco = $request->idbanco;
            $ingreso->save();
            $banco = Banco::findOrFail($idb);
            $banco->cantidad = $totalcapitalb;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
