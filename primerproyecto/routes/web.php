<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TestController;
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

Route::group(['middleware' => ['can:guardarUs']], function () {
    Route::get('/users/user/{id}', [UserController::class, 'showUsers']);
    Route::get('/users/create', [UserController::class, 'CrearUsuario']);
    Route::post('/users/create', [UserController::class, 'GuardarUsuario'])->name('guardarUs');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'intentos'])->name('intentos');
Route::post('/Cerrando', [AuthController::class, 'CerrarS'])->name('CerrarS');

Route::group(['middleware' => 'auth'] ,function () {
    Route::get('/home/escaner', [PDFController::class, 'iniciopdf']);
    Route::post('/home/escaner', [PDFController::class, 'guardarimg'])->name("guardarimg");
    Route::get('/home/generate-pdf', [PDFController::class, "generatePDF"])->name("generatePDF");
    Route::get('listar_archivos', [TestController::class, "ListarArchivos"])->name('ListarArchivos');
    Route::get('visualizar_archivos/{nombre}', [TestController::class, "VisualizarArchivos"])->name('VisualizarArchivos');
    Route::post('/home/generate-pdf',[PDFController::class, "filtrar"])->name("filtrar");
    Route::post('/home/delete_img', [PDFController::class, "eliminarimg"])->name("eliminarimg");
});


//Route::post('/home/escaner', [PDFController::class, 'eliminarimg'])->name("eliminarimg");




Route::get('/home', function () {
    return view('home');
});


Route::get('generate-pdf',[PDFController::class, "generatePDF"]);   //[PDFController::class, "intentos"]
