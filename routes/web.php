<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ReimbursementController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//DATA KARYAWAN
Route::get('/datakaryawan', [KaryawanController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('direktur.datakaryawan');

Route::get('/datakaryawan/{id}', [KaryawanController::class, 'delete'])
    ->middleware(['auth', 'verified'])
    ->name('datakaryawan.delete');

Route::get('/updatekaryawan/{id}', [KaryawanController::class, 'update_view'])
    ->middleware(['auth', 'verified'])
    ->name('datakaryawan.update');

Route::post('/updatekaryawan/{id}', [KaryawanController::class, 'update_process'])
    ->middleware(['auth', 'verified'])
    ->name('datakaryawan.update.process');

Route::get('/createKaryawan', function () {
    return view('contents.direktur.createKaryawan');
})->middleware(['auth', 'verified'])->name('direktur.createkaryawan');

// REIMBURSEMENT
Route::get('/reimbursement', [ReimbursementController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement');

Route::get('/createreimbursement', [ReimbursementController::class, 'create_view'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.create');

Route::post('/createreimbursement', [ReimbursementController::class, 'create_process'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.create.process');

Route::get('/detailreimbursement/{id}', [ReimbursementController::class, 'detail_view'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.detail');

Route::post('/acceptdirektur/{id}', [ReimbursementController::class, 'acceptdirektur'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.acceptdirektur');

Route::post('/rejectdirektur/{id}', [ReimbursementController::class, 'rejectdirektur'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.rejectdirektur');

Route::post('/acceptfinance/{id}', [ReimbursementController::class, 'acceptfinance'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.acceptfinance');

Route::post('/rejectfinance/{id}', [ReimbursementController::class, 'rejectfinance'])
    ->middleware(['auth', 'verified'])
    ->name('reimbursement.rejectfinance');

//AUTH

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
