<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::resource('sitios', 'App\Http\Controllers\SitioController');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  //  return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [App\Http\Controllers\SitioController::class, 'index'])->name('dashboard');


Route::post('registrar', [App\Http\Controllers\SitioController::class, 'storeNewUser'])->name('registrar');

Route::middleware(['auth:sanctum', 'verified'])->get('editar/{sitio}', [App\Http\Controllers\SitioController::class, 'edit'])->name('editar');