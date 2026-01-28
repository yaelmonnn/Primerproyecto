<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', HomeController::class);
Route::get('/post/mensaje', [PostController::class, 'Mensaje']);

//Nueva línea :v
Route::get('/post/about/{param?}/{nombre?}', [PostController::class, 'About']);
