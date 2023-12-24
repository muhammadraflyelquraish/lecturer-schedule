<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/{id}', [ClassController::class, 'show'])->name('classes.show');
    Route::post('/classes', [ClassController::class, 'store'])->name('classes.store');
    Route::put('/classes/{id}', [ClassController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy');

    Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul.index');
    Route::get('/matkul/{id}', [MatkulController::class, 'show'])->name('matkul.show');
    Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
    Route::post('/matkul/{id}', [MatkulController::class, 'update'])->name('matkul.update');
    Route::delete('/matkul/{id}', [MatkulController::class, 'destroy'])->name('matkul.destroy');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class, ['names' => 'users'])->middleware('can:isAdmin');
});

// <-- Schedule Matkul -->
Route::post('/schedule/{schedule}/matkul', [ScheduleController::class, 'createScheduleMatkul'])->name('shedule.matkul.store');
Route::delete('/schedule/{schedule}/matkul/{shceduleMatkul}', [ScheduleController::class, 'deleteScheduleMatkul'])->name('shedule.matkul.destroy');

// <-- Schedule -->
Route::resource('schedule', ScheduleController::class);

// Route::get('/schedule', [ScheduleController::class, 'index']);
// Route::get('/schedule/{id}', [ScheduleController::class, 'show'])->name();
// Route::post('/schedule', [ScheduleController::class, 'store']);
// Route::post('/schedule/{id}', [ScheduleController::class, 'update']);
// Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy']);




require __DIR__ . '/auth.php';
