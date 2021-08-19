<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class MikrotikController extends Controller
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
        $request->user()->authorizeRoles(['admin','tecnico']);
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);


        // Create "where" Query object for RouterOS
        $query =(new Query('/ip/hotspot/ip-binding/print'));//->select('id','mac-address as mac','address','server','type','bypassed','disabled','comment');

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        
        return view('mikrotiks.index',['response'=>$response]);
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
        $mac = $request->mac;
        $comment = $request->comment;
        $server = $request->server;
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);
        $query = new Query('/ip/hotspot/ip-binding/add');
        $query->equal('mac-address', $mac);
        $query->equal('type', 'bypassed');
        $query->equal('disabled', 'no');
        if ($server = "hotspot1") {
            $query->equal('server', 'hotspot1');
        }else{
            $query->equal('server', 'hotspot2');
        }
        
        $query->equal('comment', $comment);
        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        
        $notification = array(
            'message' => 'USUARIO REGISTRADO', 
            'alert-type' => 'success'  );
        return back()->with($notification);
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivar(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin','tecnico']);
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);

        
        // Create "where" Query object for RouterOS
        $query =(new Query('/ip/hotspot/ip-binding/disable'))->equal('.id',$id);
        //$query->equal('disabled', 'yes');
        

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        
        $notification = array(
            'message' => 'USUARIO DESABILITADO', 
            'alert-type' => 'warning'  );
        return back()->with($notification);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin','tecnico']);
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);

        
        // Create "where" Query object for RouterOS
        $query =(new Query('/ip/hotspot/ip-binding/enable'))->equal('.id',$id);
        //$query->equal('disabled', 'yes');
        

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        
        $notification = array(
            'message' => 'USUARIO HABILITADO', 
            'alert-type' => 'success'  );
        return back()->with($notification);
        
    }
    public function mkbuscar(Request $request)
    {
        $request->user()->authorizeRoles(['admin','tecnico']);
        $b = $request->busqueda;
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);


        // Create "where" Query object for RouterOS
        $query =(new Query('/ip/hotspot/ip-binding/print'))
                ->where('comment',$b);//->select('id','mac-address as mac','address','server','type','bypassed','disabled','comment');

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        return view('mikrotiks.mkbuscar',['response'=>$response]);
    }
    public function limites(Request $request)
    {
        $request->user()->authorizeRoles(['admin','tecnico']);
        $b = $request->busqueda;
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);

        //$client->query('/queue/simple/print', ['target', '192.168.200.20/32'])->read();
        $query =(new Query('/queue/simple/print'));//->select('id','mac-address as mac','address','server','type','bypassed','disabled','comment');

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        return view('mikrotiks.limites',['response'=>$response]);
    }
    
    public function mkgraficas(Request $request)
    {
        $request->user()->authorizeRoles(['admin','tecnico']);
        $b = $request->busqueda;
        // Initiate client with config object
        $client = new Client([
            'host' => '192.168.200.1',
            'user' => 'admin',
            'pass' => '021697',
            'port' => 8728,
        ]);


        // Create "where" Query object for RouterOS
        $query =(new Query('/ip/hotspot/ip-binding/print'))
                ->where('comment',$b);//->select('id','mac-address as mac','address','server','type','bypassed','disabled','comment');

        // Send query and read response from RouterOS
        $response = $client->query($query)->read();
        return view('mikrotiks.mkbuscar',['response'=>$response]);
    }
}
