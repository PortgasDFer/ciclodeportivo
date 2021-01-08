<?php

namespace LaGranLinea\Http\Controllers;

use Illuminate\Http\Request;
use LaGranLinea\User;
use LaGranLinea\Role;
use LaGranLinea\Publicacion;
use Alert;
use Redirect,Response;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str as Str;

class UsersController extends Controller
{
    public function datatable()
    {
        $user= new User();
        return datatables()
        ->eloquent($user::query()
                        ->where('users.baja','<>',1)
                  )
        ->addColumn('edit','usuarios.edit')
        ->addColumn('delete','usuarios.delete')
        ->addColumn('avatar','usuarios.avatar')
        ->addColumn('profile','usuarios.profilebtn')
        ->rawColumns(['edit','delete','avatar','profile'])
        ->toJson();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('usuarios.index',compact('users'));
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
        $user = new User();
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgusers/',$foto);
            $user->avatar=$foto;
        }
        $user->name=$request->input('name');
        $user->apellido=$request->input('apellido');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->fb=$request->input('fb');
        $user->tw=$request->input('tw');
        $user->ig=$request->input('ig');
        $user->slug_user=Str::slug($request->input('name').$request->input('apellidos'));
        $user->baja=0;
        $user->save();
        $user->roles()
        ->attach(Role::where('name', 'user')->first());
        alert()->success('Ciclo deportivo', 'Usuario registrado correctamente');
        return Redirect::to('/usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $notas=Publicacion::where('id_user','=', $user->id)
                        ->count();

        $numvisitas=Publicacion::where('id_user','=', $user->id)
                                    ->get();
        $visitasuser=0;
            foreach ($numvisitas as $num) {
                  $visitasuser+=$num->visitas;
            }  
        return view('usuarios.profile',compact('user','id','notas','visitasuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
       
        $user=User::find($id);

        if($request->hasFile('avatar')){
            $file_path = public_path() . "/imgusers/$user->avatar";
            \File::delete($file_path);

            $file = $request->file('avatar');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgusers/',$foto);
            $user->avatar=$foto;
        }


        $user->name=$request->input('nombre');
        $user->apellido=$request->input('apellido');
        $user->email=$request->input('email');
        $user->fb=$request->input('fb');
        $user->tw=$request->input('tw');
        $user->ig=$request->input('ig');
        $user->slug_user=Str::slug($request->input('name').$request->input('apellidos'));
        $user->baja=0;
        $user->save();
        alert()->success('Ciclo deportivo', 'Usuario actualizado correctamente');
        return Redirect::to('/usuarios');

    }

    public function updateOurData(Request $request,$id)
    {

        $user=User::find($id);
         
        if($request->hasFile('avatar')){
            $file_path = public_path() . "/imgusers/$user->avatar";
            \File::delete($file_path);

            $file = $request->file('avatar');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgusers/',$foto);
            $user->avatar=$foto;
        }


        $user->name=$request->input('nombre');
        $user->apellido=$request->input('apellidos');
        $user->email=$request->input('email');
        $user->fb=$request->input('fb');
        $user->tw=$request->input('tw');
        $user->ig=$request->input('ig');
        $user->bio=$request->input('bio');
        $user->baja=0;
        $user->save();
        
        alert()->success('Ciclo deportivo', 'Has actualizado tus datos correctamente');
        return Redirect::to('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->baja=1;
        $user->save();
        alert()->warning('Ciclo deportivo', 'Usuario eliminado correctamente');
        return Redirect::to('/usuarios');
    }


    public function generador()
    {
        return view('generador');
    }

    public function generar(Request $request)
    {
        $pass=Hash::make($request->input('password'));
        return $pass;
    }
}
