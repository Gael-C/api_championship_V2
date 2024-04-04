<?php

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\MatchWeekController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\MatchWeek;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('/');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/admin', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
Route::get('/teams/{slug}', [TeamController::class, 'show'])->name('team.show');

Route::get('/leagues', [LeagueController::class, 'index'])->name('league.index');
Route::get('/leagues/{slug}', [LeagueController::class, 'show'])->name('league.show');

Route::get('/matchweek', [MatchWeekController::class, 'index'])->name('matchweek.list');


require __DIR__.'/auth.php';
