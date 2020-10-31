<?php

namespace App\Http\Controllers;

use App\plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
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
        $plan = Db::table('plans')->select('id','nombre', 'megas','descripcion', 'cantdispositivos', 'precio','created_at')->get();
        return view('planes.index', ['plan' => $plan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request$request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('planes.create');
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

        $plan = new plan();
        $plan->nombre = $request->nombre;
        $plan->megas = $request->megas;
        $plan->descripcion = $request->descripcion;
        $plan->cantdispositivos = $request->cantdispositivos;
        $plan->precio = $request->precio;
        $plan->save();
        if ($plan == null) {
             $notification = array(
                    'message' => 'ERROR. El plan no se ha registrado', 
                    'alert-type' => 'error'  );
              return back()->with($notification);
        }else{
         $notification = array(
                    'message' => 'EXITO. Plan registrado', 
                    'alert-type' => 'success'  );
         return back()->with($notification);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $reques, $id)
    {
       $plan = plan::find($id);
        return view('planes.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         plan::find($id)->update($request->all());
        $notification = array(
                'message' => 'PLAN ACTUALIZADO EXITOSAMENTE', 
                'alert-type' => 'success');
         return redirect()->action('PlanController@index')->with($notification);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
    }
}
