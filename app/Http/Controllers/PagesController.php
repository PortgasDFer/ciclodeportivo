<?php

namespace LaGranLinea\Http\Controllers;

use LaGranLinea\Publicacion;
use LaGranLinea\Subcategoria;
use LaGranLinea\Categoria;
use LaGranLinea\User;
use LaGranLinea\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;


class PagesController extends Controller
{
   /*
    * Metodo index muestra la página de inicio, con publicaciones recientes, destacadas y demás.
    */
   public function inicio()
   {
      return view('welcome');
   }
   public function index()
   {

   	$recientes=Publicacion::latest()
   							->take(7)
   							->get();
   	$r1=$recientes[0];
   	$r2=$recientes[1];
   	$r3=$recientes[2];
      $r4=$recientes[3];
      $r5=$recientes[4];
      $r6=$recientes[5];
      $r7=$recientes[6];
  

   	$post1=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r1->id)
                        ->first();

   	$post2=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r2->id)
                        ->first();

   	$post3=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r3->id)
                        ->first();

      $post4=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r4->id)
                        ->first();

   	$post5=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r5->id)
                        ->first();

      $post6=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r6->id)
                        ->first();

      $post7=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('publicaciones.id','=' ,$r7->id)
                        ->first();


      $top=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->orderBy('publicaciones.visitas','DESC')
                        ->take(4)
                        ->get();

      $ligamx=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('subcategorias.slg','=' ,"liga-mx")
                        ->orderBy(DB::raw('RAND()'))
                        ->take(3)
                        ->get();

      $conmebol=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('categorias.slu','=' ,"conmebol")
                        ->orderBy(DB::raw('RAND()'))
                        ->take(3)
                        ->get();

      $otros=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id','publicaciones.visitas'))
                        ->where('categorias.slu','=' ,"otros-deportes")
                        ->orderBy(DB::raw('RAND()'))
                        ->take(3)
                        ->get();

      $tags=Tag::orderBy(DB::raw('RAND()'))
                        ->take(9)
                        ->get();

      /*
      SEO TAGS
       */
      
      SEOMeta::setTitle('Ciclo Deportivo - Todo sobre tu deporte favorito',false);
      SEOMeta::setDescription('Noticias deportivas');
      SEOMeta::addMeta('article:published_time', "13/03/2020", 'property');
      SEOMeta::addMeta('article:section', 'Noticias deportivas', 'property');
      SEOMeta::addKeyword(['Ciclo Deportivo','Noticias','Deportes','Liga MX','Copa MX','UCL','Conmebol','Internacional']);
      OpenGraph::setDescription("Todo sobre tu deporte favorito");
      OpenGraph::setTitle("Ciclo Deportivo - Todo sobre tu deporte favorito");

     OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
     OpenGraph::addProperty('type', 'news');
     OpenGraph::addProperty('locale', 'es-mx');
     OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

     TwitterCard::setTitle('Ciclo Deportivo - Todo sobre tu deporte favorito');
     TwitterCard::setSite('@CicloDeportivo1');

      return view('inicio',compact('post1','post2','post3','post4','post5','post6','post7','top','ligamx','conmebol','tags','otros'));	 
   }

   public function pageCategoria($slu)
   {
      $categoria=Categoria::where('slu','=',$slu)->firstOrFail();
      $publicaciones=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id'))
                        ->orderBy('publicaciones.fecha','desc')
                        ->where('categorias.id','=', $categoria->id)
                        ->paginate(8);
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

      SEOMeta::setTitle($categoria->nombre,"Ciclo Deportivo");
      SEOMeta::setDescription($categoria->descripcion);
      SEOMeta::addMeta('article:published_time', "13/03/2020", 'property');
      SEOMeta::addMeta('article:section', $categoria->nombre, 'property');
      SEOMeta::addKeyword(['Ciclo Deportivo','Noticias','Deportes','Liga MX','Copa MX','UCL','Conmebol','Internacional',$categoria->nombre]);
      OpenGraph::setDescription("Todo sobre tu deporte favorito");
      OpenGraph::setTitle("Ciclo Deportivo - Todo sobre tu deporte favorito");

      OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
      OpenGraph::addProperty('type', 'news');
      OpenGraph::addProperty('locale', 'es-mx');
      OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);

      TwitterCard::setTitle('Ciclo Deportivo - Todo sobre tu deporte favorito');
      TwitterCard::setSite('@CicloDeportivo1');
      return view('categoria',compact('categoria','publicaciones','top','tags'));
   }

   public function pageSubcategoria($slg)
   {
      $subcategoria=Subcategoria::where('slg','=',$slg)->firstOrFail();
      $publicaciones=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido','users.slug_user', 'users.id','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id'))
                        ->orderBy('publicaciones.fecha','desc')
                        ->where('id_subcategoria','=', $subcategoria->id)
                        ->paginate(8);
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

      SEOMeta::setTitle($subcategoria->nombresub,"Ciclo Deportivo");
      SEOMeta::setDescription($subcategoria->descripcion);
      SEOMeta::addMeta('article:published_time', "13/03/2020", 'property');
      SEOMeta::addMeta('article:section', $subcategoria->nombre, 'property');
      SEOMeta::addKeyword(['Ciclo Deportivo','Noticias','Deportes','Liga MX','Copa MX','UCL','Conmebol','Internacional',$subcategoria->nombre]);
      OpenGraph::setDescription("Todo sobre tu deporte favorito");
      OpenGraph::setTitle("Ciclo Deportivo - Todo sobre tu deporte favorito");

      OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
      OpenGraph::addProperty('type', 'news');
      OpenGraph::addProperty('locale', 'es-mx');
      OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
      return view('subcategoria',compact('subcategoria','publicaciones','top','tags'));
   }

   public function pageAutor($slug_user)
   {
      $user=User::where('slug_user','=',$slug_user)->firstOrFail();
      $publicaciones=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id'))
                        ->where('users.slug_user','=', $user->slug_user)
                        ->paginate(8);
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

      SEOMeta::setTitle($user->name ,$user->apellido,"Ciclo Deportivo");
      SEOMeta::setDescription($user->name);
      SEOMeta::addMeta('article:published_time', "13/03/2020", 'property');
      SEOMeta::addMeta('article:section', $user->name, 'property');
      SEOMeta::addKeyword(['Ciclo Deportivo','Noticias','Deportes','Liga MX','Copa MX','UCL','Conmebol','Internacional',$user->name,$user->apellido]);
      OpenGraph::setDescription("Todo sobre tu deporte favorito");
      OpenGraph::setTitle("Ciclo Deportivo - Todo sobre tu deporte favorito");

      OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
      OpenGraph::addProperty('type', 'news');
      OpenGraph::addProperty('locale', 'es-mx');
      OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
      return view('autor',compact('user','publicaciones','top','tags'));
   }

   public function pageTag($slug)
   {
      $publicaciones=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id'))
                        ->withAnyTag($slug)
                         ->paginate(8);
      $tag=Tag::where('slug','=',$slug)->firstOrFail();
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

      SEOMeta::setTitle($tag->name,"Ciclo Deportivo");
      SEOMeta::setDescription($tag->name);
      SEOMeta::addMeta('article:published_time', "13/03/2020", 'property');
      SEOMeta::addMeta('article:section', $tag->name, 'property');
      SEOMeta::addKeyword(['Ciclo Deportivo','Noticias','Deportes','Liga MX','Copa MX','UCL','Conmebol','Internacional',$tag->name]);
      OpenGraph::setDescription("Todo sobre tu deporte favorito");
      OpenGraph::setTitle("Ciclo Deportivo - Todo sobre tu deporte favorito");

      OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
      OpenGraph::addProperty('type', 'news');
      OpenGraph::addProperty('locale', 'es-mx');
      OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
      return view('tags',compact('publicaciones','tag','top','tags'));  

   }

   public function riverPlate()
   {
      $publicaciones=Publicacion::join('users','publicaciones.id_user','=','users.id')
                        ->join('subcategorias','publicaciones.id_subcategoria','subcategorias.id')
                        ->join('categorias','subcategorias.id_categoria','=','categorias.id')
                        ->select(array('publicaciones.id','publicaciones.titulo','publicaciones.subtitulo','publicaciones.cabecera', 'publicaciones.fecha', 'users.name', 'users.apellido', 'users.id','users.slug_user','subcategorias.nombresub','subcategorias.slg','publicaciones.slug','categorias.nombre','categorias.slu','categorias.id'))
                         ->paginate(8);
      $tag=Tag::where('slug','=','river-plate')->firstOrFail();
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
      SEOMeta::setTitle("Vive la pasión de River Plate","Ciclo Deportivo");
      SEOMeta::setDescription("Sigue los partidos de River Plate en vivo a través de Ciclo Deportivo.");
      SEOMeta::addMeta('article:published_time', "07/01/2021", 'property');
      SEOMeta::addMeta('article:news', 'River Plate en vivo', 'property');
      SEOMeta::addKeyword(['River Plate en vivo','Copa Diego Armando Maradona en vivo','Donde ver River Plate','River Plate vs Independiente en vivo']);
      OpenGraph::setDescription("Todo sobre tu deporte favorito");
      OpenGraph::setTitle("Ciclo Deportivo - Todo sobre tu deporte favorito");
      OpenGraph::setUrl('http://ciclodeportivo.com.mx/');
      OpenGraph::addProperty('type', 'news');
      OpenGraph::addProperty('locale', 'es-mx');
      OpenGraph::addProperty('locale:alternate', ['pt-pt', 'en-us']);
      return view('river',compact('publicaciones','tag','top','tags'));
   }
}
