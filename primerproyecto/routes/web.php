<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;

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


Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'intentos'])->name('intentos');
Route::post('/Cerrando',[AuthController::class, 'CerrarS'])->name('CerrarS');

Route::get('/home/escaner', [PDFController::class, 'iniciopdf']);
Route::post('/home/escaner', [PDFController::class, 'guardarimg'])->name("guardarimg");
//Route::post('/home/escaner', [PDFController::class, 'eliminarimg'])->name("eliminarimg");
Route::get('/home/generate-pdf',[PDFController::class, "generatePDF"]);
Route::post('/home/delete_img', [PDFController::class, "eliminarimg"])->name("eliminarimg");


Route::get('/home', function(){
    return view('home');
});

Route::post('/', [AuthController::class, "intentos"]);



   //[PDFController::class, "intentos"]
