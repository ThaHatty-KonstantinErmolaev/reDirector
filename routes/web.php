<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'registerPage')->name('register');
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/login', 'login')->name('auth');
});

Route::post('/register', [UserController::class, 'store'])->name('user.store');

Route::get('/test', [HomeController::class, 'shortenLink']);

Route::get('/{shortUtl}', [HomeController::class, 'redirectToUrl']);

Route::middleware('auth.basic')->group(function () {

});
