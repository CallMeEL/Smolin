<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SmolinController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\AdminMenuController;

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

// Route::get('/test', function () {
//     return view('admin.dashboard');});

//[+]============================================================[+]
//                        Smolin Controller
//[+]============================================================[+]

Route::get('/', [SmolinController::class, 'index'])
    ->name('home');


//[+]============================================================[+]
//                     Admin Menu Controller
//[+]============================================================[+]

Route::get('/admin', [AdminMenuController::class, 'index'])
    ->middleware('auth', 'admin')
    ->name('admin');

Route::get('/admin/create', [AdminMenuController::class, 'create'])
    ->middleware('auth', 'admin')
    ->name('admin.create-motor');

//[+]============================================================[+]
//                     Update User Controller
//[+]============================================================[+]

Route::get('/profile', [UpdateUserController::class, 'edit'])
    ->middleware('auth');

Route::put('/update', [UpdateUserController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

//[+]============================================================[+]
//                        Login Controller
//[+]============================================================[+]

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

//[+]============================================================[+]
//                      Register Controller
//[+]============================================================[+]

Route::get('/register', [RegisterController::class, 'index'])
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);
