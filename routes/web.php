<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekrutmenController;
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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkLogin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::prefix('rekrutmen')->group(function () {
        Route::get('/lowongan', [RekrutmenController::class, 'lowonganIndex'])->name('lowongan.index');
        Route::get('/lowongan/create', [RekrutmenController::class, 'lowonganCreate'])->name('lowongan.create');
        Route::post('/lowongan/store', [RekrutmenController::class, 'lowonganStore'])->name('lowongan.store');
        Route::get('/lowongan/show', [RekrutmenController::class, 'lowonganShow'])->name('lowongan.show');
        Route::get('/lowongan/edit/{id}', [RekrutmenController::class, 'lowonganEdit'])->name('lowongan.edit');
        Route::put('/lowongan/update/{id}', [RekrutmenController::class, 'lowonganUpdate'])->name('lowongan.update');
        Route::delete('/lowongan/{id}', [RekrutmenController::class, 'lowonganDestroy'])->name('lowongan.destroy');


        Route::get('/lamaran', [RekrutmenController::class, 'lamaranIndex'])->name('lamaran.index');
        Route::get('/lamaran/regist/{id}', [RekrutmenController::class, 'lamaranRegist'])->name('lamaran.regist');
        Route::post('/lamaran/store', [RekrutmenController::class, 'lamaranStore'])->name('lamaran.store');
    });
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
