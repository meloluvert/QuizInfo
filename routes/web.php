<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/inicio', [App\Http\Controllers\quizInformatica::class,'index']) -> name('iniciar');
Route::post('/quiz', [App\Http\Controllers\quizInformatica::class, 'dadosPagina'])->name('dadosPagina');

