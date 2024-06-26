<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::resource('tickets', TicketController::class)->parameters(['tickets' => 'ticket:slug']);
});

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::resource('categories', CategoryController::class);
});

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::resource('operators', OperatorController::class);
});

require __DIR__ . '/auth.php';
