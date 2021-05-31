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


Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'intentos'])->name('intentos');
Route::post('/Cerrando',[AuthController::class, 'CerrarS'])->name('CerrarS');

Route::get('/home/escaner', [PDFController::class, 'iniciopdf']);
Route::post('/home/escaner', [PDFController::class, 'guardarimg'])->name("guardarimg");
Route::get('/home/generate-pdf',[PDFController::class, "generatePDF"]);

Route::get('/home', function(){
    return view('home');
});


   //[PDFController::class, "intentos"]