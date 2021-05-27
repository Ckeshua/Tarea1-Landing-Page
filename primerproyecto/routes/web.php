<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
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
Route::get('/users/user/{id}', [UserController::class, 'showUsers']);
Route::get('/users/create', [UserController::class,'CrearUsuario']);
Route::post('/users/create', [UserController::class,'GuardarUsuario'])->name('guardarUs');


Route::get('/', function(){
    return view('login');
});

Route::get('/loged', function (){
    return view ('welcome');
});


Route::get('generate-pdf',[PDFController::class, "generatePDF"]);   //[PDFController::class, "intentos"]