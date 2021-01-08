<?php

namespace LaGranLinea\Http\Controllers;

use LaGranLinea\Publicacion;
use LaGranLinea\Subcategoria;
use LaGranLinea\Categoria;
use LaGranLinea\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->user()->authorizeRoles(['admin','mod','user']))
        {
            $publicacionesnum=Publicacion::count();
            $visitas=0;
            $publicaciones=Publicacion::all();
            foreach ($publicaciones as $post) {
                $visitas+=$post->visitas;
            }

            $categoriasnum=Categoria::count();
            $numusers=User::count();


            $topnotas = DB::table('users')
                        ->join('publicaciones','users.id','=','publicaciones.id_user')
                        ->select('users.name','users.apellido','publicaciones.titulo','publicaciones.fecha','publicaciones.visitas')
                        ->orderBy('publicaciones.visitas', 'DESC')
                        ->take(5)
                        ->get();

            $users=User::latest()
                         ->take(8)
                         ->get();

            $user=User::find($request->user()->id);

            $notas=Publicacion::where('id_user','=', $user->id)
                        ->count();

            $numvisitas=Publicacion::where('id_user','=', $user->id)
                                    ->get();
            $visitasuser=0;
            foreach ($numvisitas as $num) {
                  $visitasuser+=$num->visitas;
            }                   

          
            return view('home',compact('publicacionesnum','visitas','categoriasnum','numusers','topnotas','users','user','notas','visitasuser'));
        }elseif ($request->user()->authorizeRoles(['mod'])) {
            return view('homemod');
        }
    }
/*
    public function someAdminStuff(Request $request)
    {
        $request->user()->authorizeRoles(‘admin’);
        return view(‘some.view’);
    }
    */
}

