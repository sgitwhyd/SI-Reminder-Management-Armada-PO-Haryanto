<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UserController;


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

Route::get('/dashboard', [HomeController::class, 'index']);
// auth
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginVerify']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerVerify']);
Route::get('/forgot-pass', [AuthController::class, 'forgotPassword']);
Route::get('/logout', [AuthController::class, 'logout']);

// armada
Route::get('/armada', [ArmadaController::class, 'index']);
Route::post('/armada', [ArmadaController::class, 'store']);
Route::post('/armada/edit/(:num)', [ArmadaController::class, 'edit/$1']);


// sparepart
Route::get('/sparepart', [SparepartController::class, 'index']);


// user
Route::get('/user', [UserController::class, 'index']);