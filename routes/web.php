<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
 

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

Route::get('/', [MediaController::class, 'home']);

Route::get('/gerar-bilhete', [MediaController::class, 'generate'])->name('gerar-bilhete');
