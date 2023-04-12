<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SmolinController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\InvoiceController;

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

//[+]============================================================[+]
//                       Motor Controller
//[+]============================================================[+]

Route::get('/motor', [MotorController::class, 'create'])
    ->middleware('auth', 'admin')
    ->name('motor');

Route::post('/motor', [MotorController::class, 'store'])
    ->middleware('auth', 'admin')
    ->name('motor.store');

Route::get('/motor/{motor}', [MotorController::class, 'show'])
    ->middleware('auth')
    ->name('motor.show');

Route::post('/motor/{motor}', [MotorController::class, 'rent'])
    ->middleware('auth')
    ->name('motor.rent');


//[+]============================================================[+]
//                      Invoice Controller
//[+]============================================================[+]

Route::get('/order', [InvoiceController::class, 'index'])
    ->middleware('auth')
    ->name('order');

Route::delete('/order/{invoice}', [InvoiceController::class, 'destroy'])
    ->middleware('auth')
    ->name('order.destroy');

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