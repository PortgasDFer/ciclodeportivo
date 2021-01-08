<?php

namespace LaGranLinea\Http\Controllers;

use Illuminate\Http\Request;
use LaGranLinea\Subcategoria;
use LaGranLinea\Categoria;
use Illuminate\Support\Facades\DB;
use Alert;
use Redirect,Response;
use DataTables;
use Illuminate\Support\Str as Str;

class SubcategoriaController extends Controller
{

    public function query()
    {
   
        
        $subcate = Subcategoria::Join('categorias','subcategorias.id_categoria','=','categorias.id')
            ->select(array('subcategorias.id','subcategorias.nombresub','subcategorias.descripcion','categorias.nombre'))
            ->where('subcategorias.baja','<>',1);  
        return Datatables::of($subcate)
            ->addColumn('edit','subcategorias.edit')
            ->addColumn('delete','subcategorias.delete')
            ->rawColumns(['edit','delete'])
            ->toJson();
    }

    public function obtenerSubs($id_categoria)
    {
        $subcategorias=Subcategoria::where('id_categoria','=',$id_categoria)
                                    ->get();
        return Response::json($subcategorias);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub=Subcategoria::all();
        $cat=Categoria::all();
        return view('subcategorias.index',compact('sub','cat'));
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
        $sub = new Subcategoria();
        if($request->hasFile('img')){
            $file = $request->file('img');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/subimg/',$foto);
            $sub->header=$foto;
        }
        $sub->nombresub=$request->input('nombre');
        $sub->descripcion=$request->input('desc');
        $sub->baja=0;
        $sub->slg=Str::slug($sub->nombresub);
        $sub->id_categoria=$request->input('id_categoria');
        $sub->save();
        alert()->success('Ciclo deportivo', 'Categoría registrada correctamente');
        return Redirect::to('/subcategoria');
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
        $sub=Subcategoria::find($id);

        if($request->hasFile('newimg')){
            $file_path = public_path() . "/subimg/$sub->header";
            \File::delete($file_path);

            $file = $request->file('newimg');
            $foto = time().$file->getClientOriginalName();
            $file->move(public_path().'/subimg/',$foto);
            $sub->header=$foto;
        }
        $sub->nombresub=$request->input('nombre');
        $sub->descripcion=$request->input('desc');
        $sub->baja=0;
        $sub->slg=Str::slug($request->input('nombre'));
        $sub->id_categoria=$request->input('id_categoria');
        $sub->save();
        alert()->success('Ciclo deportivo', 'Categoría actualizada correctamente');
        return Redirect::to('/subcategoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub=Subcategoria::find($id);
        $sub->baja=1;
        $sub->save();
        alert()->warning('Ciclo deportivo', 'Subcategoría eliminada correctamente');
        return Redirect::to('/subcategoria');
    }
}
