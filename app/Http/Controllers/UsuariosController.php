<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsuariosController extends Controller
{
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
        $usuario = Db::table('users')->join('role_user','role_user.user_id','=','users.id')->join('roles','roles.id','=','role_user.role_id')->select('users.id','users.name','users.img','users.created_at','roles.name as nomrol')->get();
        return view('usuarios.index',['usuario'=>$usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $rol = DB::table('roles')->select('id','name')->get();
        return view('usuarios.create',['rol'=>$rol]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id[] = Auth::user();
        
        $ids = $user_id[0]['id'];
        // print_r($user_id); 
        $img = "user.png";
        $tipo = $request['tipo'];
        $this->validate($request,['name'=>'required','email'=>'required']);
        $user = User::create(['name'=>$request->name, 'img'=>$img, 'email'=>$request->email, 'password'=>bcrypt($request->password)]);
        $user
        ->roles()
        ->attach(Role::where('name', $tipo)->first());
        $notification = array(
                    'message' => 'EXITO. USUARIO REGISTRADO', 
                    'alert-type' => 'success'        );

            return redirect()->action('UsuariosController@index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $tecnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        $notification = array(
            'message' => 'USUARIO ELIMINADO EXITOSAMENTE', 
            'alert-type' => 'success');
        return redirect()->action('UsuariosController@index')->with($notification);
    }
}
