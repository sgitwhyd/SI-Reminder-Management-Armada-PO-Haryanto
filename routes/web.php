<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\KepalaGudangController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\PerbaikanController;
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

Route::middleware(['auth', 'checkRole:KEPALA-GUDANG'])->prefix('kepala-gudang')->as('kepala_gudang.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'indexKepalaGudang']);
    // armada
    Route::get('/armada', [ArmadaController::class, 'index']);
    Route::post('/armada', [ArmadaController::class, 'store']);
    Route::post('/armada/edit', [ArmadaController::class, 'edit']);
    Route::put('/armada/update/', [ArmadaController::class, 'update']);
    Route::delete('armada/delete/{id}', [ArmadaController::class, 'destroy']);

    Route::group(['prefix' => 'sparepart'], function () {
        // sparepart
        Route::get('/', [SparepartController::class, 'index']);
        Route::post('/', [SparepartController::class, 'store']);
        Route::post('/edit', [SparepartController::class, 'edit']);
        Route::put('/update', [SparepartController::class, 'update']);
        Route::delete('/delete/{id}', [SparepartController::class, 'destroy']);
        Route::get('/xlsx', [SparepartController::class, 'exportXlsx']);

        // riwayat sparepart
        Route::get('/riwayat', [SparepartController::class, 'riwayatSparepart']);
    });



    // user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::post('/edit', [UserController::class, 'edit']);
        Route::put('/update', [UserController::class, 'update']);
        Route::delete('user/delete/{id}', [UserController::class, 'destroy']);

    });

    // perbaikan
    Route::group(['prefix' => 'perbaikan'], function () {
        Route::get('/', [PerbaikanController::class, 'showPerbaikan']);
        Route::get('/buat-perbaikan', [PerbaikanController::class, 'createPerbaikan']);
        Route::post('/buat-perbaikan', [PerbaikanController::class, 'storePerbaikan'])->name('buat-perbaikan');
        Route::get('/detail/{id}', [PerbaikanController::class, 'detailPerbaikan']);
        Route::delete('/delete/{id}', [PerbaikanController::class, 'destroy']);
    });

    // perawatan
    Route::group(['prefix' => 'perawatan'], function () {
        Route::get('/', [PerawatanController::class, 'index']);
        Route::get('/buat-perawatan', [PerawatanController::class, 'create']);
        Route::post('/buat-perawatan', [PerawatanController::class,'store'])->name('buat-perawatan');
        Route::post('/edit/{id}', [PerawatanController::class, 'edit']);
        Route::put('/update/{id}', [PerawatanController::class, 'update']);
        Route::delete('/delete/{id}', [PerawatanController::class, 'destroy']);

    });

    // rampcheck
    Route::group(['prefix' => 'rampcheck'], function () {
        Route::get('/', [RampcheckController::class, 'index']);
        Route::get('/add', [RampcheckController::class, 'create']);
        Route::get('/show/{id}', [RampcheckController::class,'show']);
        Route::post('/', [RampcheckController::class,'store']);
        Route::get('/edit/{id}', [RampcheckController::class, 'edit']);
        Route::put('/update/{id}', [RampcheckController::class, 'update']);
        Route::delete('rampcheck/delete/{id}', [RampcheckController::class, 'destroy']);
        Route::get('/pdf/{id}', [RampcheckController::class, 'rampcheckPDF']);

    });

});

Route::middleware(['auth', 'checkRole:CREW'])->prefix('crew')->group(function () {
    Route::get('/dashboard', [CrewController::class, 'index']);
    Route::get('/riwayat-perbaikan', [CrewController::class, 'riwayatPerbaikan']);
    Route::get('/riwayat-perawatan', [CrewController::class, 'riwayatPerawatan']);
    Route::get('/buat-rampcheck', [CrewController::class, 'createRampcheck']);
    Route::post('/buat-rampcheck', [CrewController::class, 'storeRampcheck']);
    Route::get('/riwayat-rampcheck', [CrewController::class, 'riwayatRampcheck']);
    Route::get('/pdf/{id}', [RampcheckController::class, 'rampcheckPDF']);

});

Route::middleware(['auth', 'checkRole:MEKANIK'])->prefix('mekanik')->as('mekanik.')->group(function () {
    // perawatan
    Route::get('/perawatan', [MekanikController::class, 'showPerawatan']);
    Route::get('/tambah-perawatan', [MekanikController::class, 'createPerawatan']);
    Route::post('/tambah-perawatan', [MekanikController::class, 'storePerawatan'])->name('tambah-perawatan');
    // perbaikan
    Route::get('/perbaikan', [MekanikController::class, 'showPerbaikan']);
    Route::get('/tambah-perbaikan', [MekanikController::class, 'createPerbaikan']);
    Route::post('/tambah-perbaikan', [MekanikController::class, 'storePerbaikan'])->name('tambah-perbaikan');

    Route::get('/suku-cadang', [MekanikController::class, 'showSukuCadang']);
});
