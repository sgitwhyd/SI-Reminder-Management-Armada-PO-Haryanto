<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\RampcheckController;

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

Route::get('/', function () { return redirect('login'); });

// auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginVerify']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerVerify']);
Route::get('/forgot-pass', [AuthController::class, 'forgotPassword']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'checkRole:KEPALA-GUDANG'])->prefix('kepala-gudang')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'indexKepalaGudang']);
    // armada
    Route::get('/armada', [ArmadaController::class, 'index']);
    Route::post('/armada', [ArmadaController::class, 'store']);
    Route::post('/armada/edit', [ArmadaController::class, 'edit']);
    Route::put('/armada/update/', [ArmadaController::class, 'update']);
    Route::delete('armada/delete/{id}', [ArmadaController::class, 'destroy']);

    // sparepart
    Route::get('/sparepart', [SparepartController::class, 'index']);
    Route::post('/sparepart', [SparepartController::class, 'store']);
    Route::post('/sparepart/edit', [SparepartController::class, 'edit']);
    Route::put('/sparepart/update', [SparepartController::class, 'update']);
    Route::delete('sparepart/delete/{id}', [SparepartController::class, 'destroy']);

    // user
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::post('/user/edit', [UserController::class, 'edit']);
    Route::put('/user/update', [UserController::class, 'update']);
    Route::delete('user/delete/{id}', [UserController::class, 'destroy']);

    // perawatan
    Route::get('/perawatan', [PerawatanController::class, 'index']);
    Route::get('/perawatan/add', [PerawatanController::class, 'create']);
    Route::post('/perawatan', [PerawatanController::class,'store']);
    Route::post('/perawatan/edit', [PerawatanController::class, 'edit']);
    Route::put('/perawatan/update', [PerawatanController::class, 'update']);
    Route::delete('perawatan/delete/{id}', [PerawatanController::class, 'destroy']);

    // rampcheck
    Route::get('/rampcheck', [RampcheckController::class, 'index']);
    Route::get('/rampcheck/add', [RampcheckController::class, 'create']);
    Route::get('/rampcheck/show/{id}', [RampcheckController::class,'show']);
    Route::post('/rampcheck', [RampcheckController::class,'store']);
    Route::get('/rampcheck/edit/{id}', [RampcheckController::class, 'edit']);
    Route::put('/rampcheck/update', [RampcheckController::class, 'update']);
    Route::delete('rampcheck/delete/{id}', [RampcheckController::class, 'destroy']);
    Route::get('/rampcheck/pdf/{id}', [RampcheckController::class, 'rampcheckPDF']);

});

Route::middleware(['auth', 'checkRole:CREW'])->prefix('crew')->group(function () {
    Route::get('/dashboard', [CrewController::class, 'index']);
    Route::get('/riwayat-perbaikan', [CrewController::class, 'riwayatPerbaikan']);
    Route::get('/riwayat-perawatan', [CrewController::class, 'riwayatPerawatan']);
    Route::get('/riwayat-rampcheck', [CrewController::class, 'riwayatRampcheck']);
});

Route::middleware(['auth', 'checkRole:MEKANIK'])->prefix('mekanik')->as('mekanik.')->group(function () {
    Route::get('/perawatan', [MekanikController::class, 'showPerawatan']);
    Route::get('/tambah-perawatan', [MekanikController::class, 'createPerawatan']);
    Route::post('/tambah-perawatan', [MekanikController::class, 'storePerawatan'])->name('tambah-perawatan');
    Route::get('/perbaikan', [MekanikController::class, 'showPerbaikan']);
    Route::get('/tambah-perbaikan', [MekanikController::class, 'createPerbaikan']);
    Route::post('/tambah-perbaikan', [MekanikController::class, 'storePerbaikan'])->name('tambah-perbaikan');
});
