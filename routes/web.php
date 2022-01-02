<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DigitalBoardController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/download/{document}', [DigitalBoardController::class, 'download'])->name('digital-board.download');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/aushang', [DigitalBoardController::class, 'index'])
    ->middleware('token.public')
    ->name('digital-board.index');

Route::middleware('auth', 'verified')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::get('calendar', CalendarController::class)->name('calendar');

    Route::get('digital-board', [DigitalBoardController::class, 'edit'])->name('digital-board.edit');
    Route::post('digital-board', [DigitalBoardController::class, 'store'])->name('digital-board.store');
    Route::delete('digital-board/{document}', [DigitalBoardController::class, 'destroy'])->name('digital-board.destroy');

});

require __DIR__.'/auth.php';
