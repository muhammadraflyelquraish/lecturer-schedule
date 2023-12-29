<?php

use App\Models\ScheduleMatkulClass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ScheduleMatkulClassController;

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
    Route::resource('classes', ClassController::class);
    Route::resource('matkul', MatkulController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class, ['names' => 'users'])->middleware('can:isAdmin');
});

// <-- Schedule Matkul -->
Route::post('/schedule/{schedule}/matkul', [ScheduleController::class, 'createScheduleMatkul'])->name('shedule.matkul.store');
Route::delete('/schedule/{schedule}/matkul/{scheduleMatkul}', [ScheduleController::class, 'deleteScheduleMatkul'])->name('shedule.matkul.destroy');

// <-- Schedule Matkul Class -->
Route::post('/schedule/{schedule}/matkul/{scheduleMatkul}/class', [ScheduleController::class, 'createScheduleMatkulClass'])->name('shedule.matkul.class.store');
Route::delete('/schedule/{schedule}/matkul/{scheduleMatkul}/class/{scheduleMatkulClass}', [ScheduleController::class, 'deleteScheduleMatkulClass'])->name('shedule.matkul.class.destroy');

// <-- Schedule -->
Route::resource('schedule', ScheduleController::class);

// <-- Schedule -->
Route::resource('courses', ScheduleMatkulClassController::class);

require __DIR__ . '/auth.php';
