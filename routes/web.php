<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\GmController;
use App\Http\Controllers\MhController;
use App\Http\Controllers\MkController;
use App\Http\Controllers\MlController;
use App\Http\Controllers\MmController;
use App\Http\Controllers\MpController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});
// admin routes
route::middleware(['auth'])->middleware('userAkses:admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', 'index')->name('index');
    });
});
// direktur routes
route::middleware(['auth'])->middleware('userAkses:direktur')->group(function () {
    Route::controller(DirekturController::class)->group(function () {
        Route::get('/direktur', 'index')->name('index');
    });
});
// general manager routes
route::middleware(['auth'])->middleware('userAkses:gm')->group(function () {
    Route::controller(GmController::class)->group(function () {
        Route::get('/general-manager', 'index')->name('index');
    });
});
// manager HRD
Route::middleware(['auth', 'userAkses:mh'])->group(function () {
    Route::controller(MhController::class)->group(function () {
        Route::get('/manager-hrd', 'index')->name('index');

        // KPI routes
        Route::get('/manager-hrd/kpi', 'kpi')->name('kpi.index');
        Route::get('/manager-hrd/kpi/create', 'create')->name('kpi.create');
        Route::post('/manager-hrd/kpi', 'store')->name('kpi.store');
        Route::get('/manager-hrd/kpi/{kpi}/edit', 'edit')->name('kpi.edit');
        Route::put('/manager-hrd/kpi/{kpi}', 'update')->name('kpi.update');
        Route::delete('/manager-hrd/kpi/{kpi}', 'destroy')->name('kpi.destroy');
        Route::get('/get-jabatan/{user_id}',  'getJabatanByUser')->name('getJabatanByUser');
        Route::get('/get-descriptions/{jabatan_id}', 'getDescriptionsByJabatan')->name('getDescriptionsByJabatan');
        Route::get('/get-bobot/{desc_id}', 'getBobotByDesc')->name('getBobotByDesc');

        // PDF export route
        Route::get('export-pdf/{type}', 'KPIexportPDF')->name('export.pdf');
    });
});

// manager marketing routes
route::middleware(['auth'])->middleware('userAkses:mm')->group(function () {
    Route::controller(MmController::class)->group(function () {
        Route::get('/manager-marketing', 'index')->name('index');
    });
});
// manager legal routes
route::middleware(['auth'])->middleware('userAkses:ml')->group(function () {
    Route::controller(MlController::class)->group(function () {
        Route::get('/manager-legal', 'index')->name('index');
    });
});
// manager keuangan routes
route::middleware(['auth'])->middleware('userAkses:mk')->group(function () {
    Route::controller(MkController::class)->group(function () {
        Route::get('/manager-keuangan', 'index')->name('index');
    });
});
// manager 
route::middleware(['auth'])->middleware('userAkses:mp')->group(function () {
    Route::controller(MpController::class)->group(function () {
        Route::get('/manager-produksi', 'index')->name('index');
    });
});

route::middleware(['auth'])->group(function () {
    Route::get('/hrd', [AdminController::class, 'index'])->middleware('userAkses:hrd');
});
route::middleware(['auth'])->group(function () {
    Route::get('/marketing', [AdminController::class, 'index'])->middleware('userAkses:marketing');
});
route::middleware(['auth'])->group(function () {
    Route::get('/legal', [AdminController::class, 'index'])->middleware('userAkses:legal');
});
route::middleware(['auth'])->group(function () {
    Route::get('/produksi', [AdminController::class, 'index'])->middleware('userAkses:produksi');
});
