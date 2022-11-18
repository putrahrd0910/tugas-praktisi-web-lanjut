<?php

use Illuminate\Support\Facades\Route;
//tambahan
use App\Http\Controllers\lv1Controller;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\formTodosController;
use App\Http\Controllers\mahasiswaController;


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

Route::get('/', function () {
    return view('welcome');
});

//route dgn parameter
//Route::get('/show/{id?}', function ($id) { 
//    return "Nilai Parameter Adalah ".$id;
//});

//route dgn reguler expression
Route::get('/edit/{masPutra}', function ($nama) { 
    return "Nilai Parameter Adalah ".$nama; 
})->where('masPutra','[A-Za-z]+'); 

//route dgn nama
Route::get('/index', function () { 
    return "<a href='".route('create').
    "'>Akses Route dengan nama </a>";
});

Route::get('/create', function () { 
    return "Route diakses menggunakan nama"; })->name('create');

//route dgn tampil
Route::get('/tampil/{mas_putra}', function ($nama) {
    return "WOI NAMAKU ". $nama;
});

//route dgn controller
Route::get('/halo',[lv1Controller::class, 'index']);

//route produkcontroller
Route::get('/produk',[ProdukController::class,'index']);

//route control stuktur pd blade
Route::get('/produk/show',[ProdukController::class,'show']);

//route layout blade
Route::get('/halaman',function(){
    $title = 'Harry Pooter';
    $konten = 'harry potter and the deathly hallows: part 2';
    return view('konten.halaman',compact('title','konten'));
   });

//route tgs 6
Route::resource('produk', ProdukController::class);

//route formTodos
//Route::get('/todos', [formTodosController::class, 'formTodos']);

Route::resource('todos', formTodosController::class);

//route mhs
Route::resource('mahasiswa', mahasiswaController::class);

//route builder orm
Route::get('/builder',[produkController::class,'builder']);

//route orm
Route::get('/show',[produkController::class,'show_eloquent']);

Route::get('/insert',[produkController::class,'insert_eloquent']);

Route::get('/update',[produkController::class,'update_eloquent']);


//untuk verifikasi email user
Auth::routes();
Auth::routes(['verify' =>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['logincheck:admin']], function() {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['logincheck:editor']], function() {
        Route::resource('editor', EditorController::class);
    });
});