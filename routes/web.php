<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvShowController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/lists', [ListController::class, 'index'])->name('list.index');

    Route::get('/movies/{page?}', [MovieController::class, 'index'])->name('movie.index');
    Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

    Route::get('/tvs/{page?}', [TvShowController::class, 'index'])->name('tv.index');
    Route::get('/tv/{id}', [TvShowController::class, 'show'])->name('tv.show');

    Route::get('actors/{page?}', [ActorController::class, 'index'])->name('actor.index');
    Route::get('actor/{id}', [ActorController::class, 'show'])->name('actor.show');

    Route::get('/genre/tv/{id}/{page?}', [GenreController::class, 'show'])->name('genre.tv.show');
    Route::get('/genre/movie/{id}/{page?}', [GenreController::class, 'show'])->name('genre.movie.show');
});
