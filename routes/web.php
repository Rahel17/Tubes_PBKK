<?php

use App\Models\Webinar;
use App\Models\Pemateri;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\PemateriController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', [UserController::class, 'index'])->name('users.dashboard');

Route::get('/pemateri', [PemateriController::class, 'index'])->name('pemateri.index');
Route::post('/pemateri/store', [PemateriController::class, 'store'])->name('pemateri.store');
Route::get('/pemateri/edit/{id}', [PemateriController::class, 'edit'])->name('pemateri.edit');
Route::put('/pemateri/update/{id}', [PemateriController::class, 'update'])->name('pemateri.update');
Route::delete('/pemateri/destroy/{id}', [PemateriController::class, 'destroy'])->name('pemateri.destroy');

Route::get('/webinar', [WebinarController::class, 'index'])->name('webinar.index');
Route::post('/webinar/store', [WebinarController::class, 'store'])->name('webinar.store');
Route::get('/webinar/edit/{id}', [WebinarController::class, 'edit'])->name('webinar.edit');
Route::put('/webinar/update/{id}', [WebinarController::class, 'update'])->name('webinar.update');
Route::delete('/webinar/destroy/{id}', [WebinarController::class, 'destroy'])->name('webinar.destroy');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');


require __DIR__.'/auth.php';
