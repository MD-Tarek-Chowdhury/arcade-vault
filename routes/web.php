<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [GameController::class, 'index'])->name('dashboard');
    Route::delete('/game/{game}', [GameController::class, 'destroy'])->name('game.destroy');
});

require __DIR__.'/settings.php';
