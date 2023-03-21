<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SmolinController;

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

Route::get('/profile', function (){
    return view('beranda.profile');
});
//[+]============================================================[+]
//                        Smolin Controller
//[+]============================================================[+]

Route::get('/home', [SmolinController::class, 'index']);



//[+]============================================================[+]
//                        Login Controller
//[+]============================================================[+]

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

//[+]============================================================[+]
//                      Register Controller
//[+]============================================================[+]

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);
