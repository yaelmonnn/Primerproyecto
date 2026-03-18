<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Pagina;

Route::get('/', function () {
    return view('welcome');
})->name('vista_inicio');

Route::get('/contact', function(){
    $nombre = "Jose Yael Mex Montero";
    return view('contact', ['nombre'=>$nombre, 'carrera'=>'LATI']);
})->name('contact');

Route::get('/principal', function(){
    $datos = ["titulo"=>"Tienda Virtual - Vista Principal",
    "mensaje"=>"Bienvenido a la vista principal"];
    return view('principal', $datos);
})->name('principal');

Route::get('/empresa', [HomeController::class, 'empresa'])->name('empresa');
Route::get('nuevoregistro',function(){
    $pagina=new Pagina;
    $pagina->name='Yael';
    $pagina->email='yael@gmail.com';
    $pagina->email_verified_at=date('Y-m-d H:i:s');
    $pagina->password='1234';
    $pagina->avatar='user.png';
    $pagina->telefono='123456';
    $pagina->calle='12';
    $pagina->save();
    return $pagina;
});

//Definido el método para buscar por el ID
Route::get('buscarpaginaid',function(){
    $post=Pagina::find(2);
    return $post;
});

//Definido el metodo para buscar por un campo determinado
Route::get('buscarxname',function(){
    $post=Pagina::where('name','Yael')->first();
    return $post;
});

//Para recuperar más de un registro
Route::get('obtenertodos',function(){
    $posts=Pagina::all();
    return $posts;
});

Route::get('updatename',function(){
    $post=Pagina::where('name','Yael')->first();
    $post->email='yael@gmail.com';
    $post->save();
    return $post;
});

Route::get('filter',function(){
    $posts=Pagina::where('calle','like','%12%')->get();
    return $posts;
});

Route::get('trescampos',function(){
    $posts=Pagina::select('name','email','telefono')->get();
    return $posts;
});

Route::get('filtroxnumreg',function(){
    $posts=Pagina::select('name','email')->orderBy('name')->take(2)->get();
    return $posts;
});

Route::get('eliminar_registro',function(){
    $post=Pagina::find(4);
    $post->delete();
    return "Registro eliminado";
});

Route::get('Obtenerfechaformato',function(){
    $post=Pagina::select('name','email','created_at')->find(2);
    return $post;
});

Route::get('Obtenerestatus',function(){
    $post=Pagina::find(1);
    dd($post->is_active);
});

Route::put('/actualizar-dato/{id}',[HomeController::class,'update'])->name('actualizar.dato');
Route::put('/eliminar-logico/{id}', [HomeController::class, 'eliminarLogico']);
Route::delete('/eliminar-fisico/{id}', [HomeController::class, 'eliminarFisico']);
