<?php
use LaGranLinea\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PagesController@index')->name('index');
Route::get('/categorias/{categoria}','PagesController@pageCategoria')->name('categorias.page');
Route::get('/subcategorias/{subcategoria}','PagesController@pageSubcategoria')->name('categorias.page');
Route::get('/autores/{autor}','PagesController@pageAutor')->name('autores.page');
Route::get('/etiquetas/{tag}','PagesController@pageTag')->name('tag.page');
Route::get('/river','PagesController@RiverPlate')->name('river.plate');
Route::get('/busqueda/','PublicacionController@search')->name('search.page');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/categoria','CategoriasController');
Route::get('/obtenerCategorias','CategoriasController@obtenerCat')->name('datatables.categorias');

Route::resource('/subcategoria','SubcategoriaController');
Route::get('/obtenerSub','SubcategoriaController@query')->name('datatables.subcategorias');
Route::get('/consultaSub/{subcategoria}','SubcategoriaController@obtenerSubs')->name('subs.dinamico');

Route::resource('/usuarios','UsersController');
Route::get('/obtenerUsers','UsersController@datatable')->name('datatables.users');
Route::put('/updateMyData/{usuario}','UsersController@updateOurData')->name('updatemydata.users');

Route::resource('/posts','PublicacionController');
Route::get('/obtenerPosts','PublicacionController@datatable')->name('datatables.posts');
Route::get('/postsUser/{usuario}','PublicacionController@myPostsDatatable')->name('usersdatatables.posts');
Route::get('/myPosts/{usuario}','PublicacionController@myPosts')->name('posts.myposts');
Route::get('/redactar','PublicacionController@redactar')->name('posts.redactar');
Route::post('/publicar','PublicacionController@publicar')->name('posts.publicar');
Route::get('/editMyPost/{publicacion}/edit','PublicacionController@editMyPost')->name('editMyPost.posts');
Route::put('/actualizar/{publicacion}','PublicacionController@actualizar')->name('actualizar.mipost');
Route::delete('/borrarPost/{publicacion}','PublicacionController@eliminarMiPost')->name('eliminar.mipost');

Route::get('/generador', 'UsersController@generador');
Route::post('/generar','UsersController@generar');

