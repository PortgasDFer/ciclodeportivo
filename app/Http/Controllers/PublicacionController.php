<?php

namespace LaGranLinea\Http\Controllers;

use LaGranLinea\Publicacion;
use Illuminate\Http\Request;
use LaGranLinea\Subcategoria;
use LaGranLinea\Categoria;
use LaGranLinea\User;
use LaGranLinea\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str as Str;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Carbon\Carbon;
use Alert;
use Redirect,Response;
use DataTables;
use Cache;


class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function datatable()
    {
        $posts=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->select(array('publicaciones.titulo', 'publicaciones.fecha', 'users.name', 'users.apellido', 'subcategorias.nombresub','publicaciones.slug','publicaciones.id','publicaciones.visitas','publicaciones.baja'));
                        return Datatables::of($posts)
                         ->editColumn('fecha', function ($post) {
                            return $post->fecha ? with(new Carbon($post->fecha))->format('d/m/Y') : '';
                        })
                        ->filterColumn('fecha', function ($query, $keyword) {
                            $query->whereRaw("DATE_FORMAT(fecha,'%d/%m/%Y') like ?", ["%$keyword%"]);
                        })
                        ->addColumn('edit','posts.botones.edit')
                        ->addColumn('delete','posts.botones.delete')
                        ->addColumn('preview','posts.botones.preview')
                        ->rawColumns(['edit','delete','preview'])
                        ->toJson(); 
    }

    public function myPostsDatatable($id)
    {
        $posts=Publicacion::join('users','publicaciones.id_user','=','users.id')
                    ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                    ->select(array('publicaciones.titulo', 'publicaciones.fecha', 'users.name', 'users.apellido','users.id', 'subcategorias.nombresub','publicaciones.slug','publicaciones.id','publicaciones.visitas','publicaciones.baja'))
                    ->where('users.id','=',$id);
                    return Datatables::of($posts)
                     ->editColumn('fecha', function ($post) {
                        return $post->fecha ? with(new Carbon($post->fecha))->format('d/m/Y') : '';
                    })
                    ->filterColumn('fecha', function ($query, $keyword) {
                        $query->whereRaw("DATE_FORMAT(fecha,'%d/%m/%Y') like ?", ["%$keyword%"]);
                    })
                    ->addColumn('edit','usuarios.botones.edit')
                    ->addColumn('delete','usuarios.botones.delete')
                    ->addColumn('preview','posts.botones.preview')
                    ->rawColumns(['edit','delete','preview'])
                    ->toJson(); 
    }

    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Categoria::all();
        return view('posts.redactar',compact('cat'));
    }


    public function redactar()
    {
        $cat=Categoria::all();
        return view('posts.redactarUser',compact('cat'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags= explode(',', $request->tags);

        $post= new Publicacion();

        if($request->hasFile('cabecera')){
            $file = $request->file('cabecera');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/headers/',$foto);
            $post->cabecera=$foto;
        }

        $post->titulo=$request->input('titulo');
        $post->slug=Str::slug($post->titulo);
        $post->subtitulo=$request->input('subtitulo');
        $post->fecha=$request->input('fecha');
        $post->contenido=$request->input('contenido');
        $post->id_subcategoria=$request->input('subcategoria');
        $post->id_user=$request->input('id_user');
        $post->baja=0;
        $post->visitas=0;
        $post->save();

        $post->tag($tags);

        alert()->success('Ciclo deportivo', 'Publicación realizada correctamente');
        return Redirect::to('/posts');

    }

    public function publicar(Request $request)
    {
         $tags= explode(',', $request->tags);

        $post= new Publicacion();

        if($request->hasFile('cabecera')){
            $file = $request->file('cabecera');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/headers/',$foto);
            $post->cabecera=$foto;
        }

        $post->titulo=$request->input('titulo');
        $post->slug=Str::slug($post->titulo);
        $post->subtitulo=$request->input('subtitulo');
        $post->fecha=$request->input('fecha');
        $post->contenido=$request->input('contenido');
        $post->id_subcategoria=$request->input('subcategoria');
        $post->id_user=$request->input('id_user');
        $post->baja=0;
        $post->visitas=0;
        $post->save();

        $post->tag($tags);

        alert()->success('Ciclo deportivo', 'Publicación realizada correctamente');
        return Redirect::to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \LaGranLinea\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Publicacion::where('slug','=',$slug)->firstOrFail();
        if(Cache::has($slug)==false){
            Cache::add($slug,'contador',0.30);
            $num=$post->visitas;
            $num++;
            $post->visitas=$num;
            $post->save();
        }

        $datos=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha','publicaciones.slug', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas','users.tw','users.avatar','users.bio'))
                        ->where('publicaciones.slug','=',$post->slug)
                        ->first();


        SEOMeta::setTitle($post->titulo,false);
        SEOMeta::setDescription($post->subtitulo);
        SEOMeta::addMeta('article:published_time', $datos->fecha->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $datos->nombresub, 'property');
        SEOMeta::addKeyword([$datos->nombresub, $datos->nombre]);
        OpenGraph::setDescription($post->subtitulo);
        OpenGraph::setTitle($post->titulo);

        OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'es-mx');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        TwitterCard::setTitle($datos->titulo);
        TwitterCard::setSite('@CicloDeportivo1');


        $top=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->orderBy('publicaciones.visitas','DESC')
                        ->take(4)
                        ->get();

        $tags=Tag::orderBy(DB::raw('RAND()'))
                        ->take(9)
                        ->get();
        //return dd($datos);
        return view('post',compact('post','datos','top','tags'));
    }

    public function myPosts($id)
    {
        $user=User::find($id);
        $posts=Publicacion::where('id_user','=',$user->id)
        ->get();
        return view('usuarios.postsbyuser',compact('user','posts'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaGranLinea\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Publicacion::where('slug','=',$slug)->firstOrFail();
        $cat=Categoria::all();
        alert()->message('Ciclo deportivo', 'Editar publicacion');
        return view('posts.editar',compact('post','cat'));
    }

    public function editMyPost($slug)
    {
        $post = Publicacion::where('slug','=',$slug)->firstOrFail();
        $cat=Categoria::all();
        alert()->message('Ciclo deportivo', 'Editar publicacion');
        return view('usuarios.editarMiPost',compact('post','cat'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaGranLinea\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Publicacion::where('slug','=',$slug)->firstOrFail();
        if($request->hasFile('cabecera')){
            $file_path = public_path() . "/headers/$post->cabecera";
            \File::delete($file_path);
            $file = $request->file('cabecera');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/headers/',$foto);
            $post->cabecera=$foto;
        }
        $post->titulo=$request->input('titulo');
        $post->slug=Str::slug($request->input('titulo'));
        $post->subtitulo=$request->input('subtitulo');
        $post->fecha=$request->input('fecha');
        $post->contenido=$request->input('contenido');
        $post->id_subcategoria=$request->input('subcategoria');
        $post->id_user=$request->input('id_user');
        $post->baja=0;
        $post->save();
        $tags= explode(',', $request->tags);
        $post->tag($tags);
        alert()->success('Ciclo deportivo', 'Publicación editada correctamente');
        return Redirect::to('/posts');
    }

    public function actualizar(Request $request, $slug)
    {
        $post = Publicacion::where('slug','=',$slug)->firstOrFail();
        if($request->hasFile('cabecera')){
            $file_path = public_path() . "/headers/$post->cabecera";
            \File::delete($file_path);
            $file = $request->file('cabecera');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/headers/',$foto);
            $post->cabecera=$foto;
        }
        $post->titulo=$request->input('titulo');
        $post->slug=Str::slug($request->input('titulo'));
        $post->subtitulo=$request->input('subtitulo');
        $post->fecha=$request->input('fecha');
        $post->contenido=$request->input('contenido');
        $post->id_subcategoria=$request->input('subcategoria');
        $post->id_user=$request->input('id_user');
        $post->baja=0;
        $post->save();
        $tags= explode(',', $request->tags);
        $post->tag($tags);
        alert()->success('Ciclo deportivo', 'Publicación editada correctamente');
        return Redirect::to('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaGranLinea\Publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Publicacion::find($id);
        $file_path = public_path() . "/headers/$post->cabecera";
            \File::delete($file_path);
        $post->delete();
        alert()->success('Ciclo deportivo', 'Publicación eliminada correctamente');
        return Redirect::to('/posts');
    }

    public function eliminarMiPost($id)
    {
        $post=Publicacion::find($id);
        $file_path = public_path() . "/headers/$post->cabecera";
            \File::delete($file_path);
        $post->delete();
        alert()->success('Ciclo deportivo', 'Publicación eliminada correctamente');
        return Redirect::to('/home');
    }
    public function search(Request $request)
    {
        $palabra = $request->get('search');

        $publicaciones=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido','users.slug_user', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id'))
                        ->orderBy('fecha','ASC')
                        ->search($palabra)
                        ->paginate(8);
        //return $resultados;
        $top=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->orderBy('publicaciones.visitas','DESC')
                        ->take(4)
                        ->get();

        $tags=Tag::orderBy(DB::raw('RAND()'))
                        ->take(9)
                        ->get();

        //return $palabra;
        //
        SEOMeta::setTitle("Busqueda por palabra",false);
        SEOMeta::setDescription("Resultados de la busqueda");
        SEOMeta::addMeta('article:section', "Resultados de la busqueda", 'property');
        SEOMeta::addKeyword(["Ciclo Deportivo","Deportes","Noticias","Futbol","CONMEBOL",$palabra]);
        OpenGraph::setDescription("Busqueda por palabra");
        OpenGraph::setTitle("Busqueda por palabra");

        OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'es-mx');
        OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

        TwitterCard::setTitle("Ciclo Deportivo Todo sobre tu deporte favorito");
        TwitterCard::setSite('@CicloDeportivo1');
        return view('search',compact('palabra','publicaciones','top','tags'));
    }
}
