<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [LoginController::class, 'home'])->name('home');



Route::post('/login', [LoginController::class, 'signIn'])->name('login');
Route::post('/logout', [LoginController::class, 'signOut'])->name('logout');


Route::middleware('auth' ,'check.is.admin')->group(function () {
    Route::get('/gerar-bilhete', [MediaController::class, 'generate'])->name('gerar-bilhete');
    Route::get('/find-ticket', [MediaController::class, 'findTicket'])->name('find-ticket');
    Route::get('/view-ticket/{ticket}', [MediaController::class, 'viewTicket'])->name('view-ticket');
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/ticket', [DashboardController::class, 'ticket'])->name('ticket');
    Route::get('/search-ticket', [DashboardController::class, 'searchTicket'])->name('search-ticket');
   
});