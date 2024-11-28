<?php

use App\Http\Controllers\AlbunsController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\IdiomasController;
use App\Http\Controllers\MusicasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('generos')->middleware('auth')->group(function (){
    Route::get('/', [GenerosController::class, 'index'])-> name('generos-index');
    Route::get('/create', [GenerosController::class, 'create'])-> name('generos-create');
    Route::post('/', [GenerosController::class, 'store'])-> name('generos-store');
    Route::get('/{id}/edit', [GenerosController::class, 'edit'])->where('id', '[0-9]+')->name('generos-edit');
    Route::put('/{id}', [GenerosController::class, 'update'])->where('id', '[0-9]+')->name('generos-update');
    Route::delete('/{id}', [GenerosController::class, 'destroy'])->where('id', '[0-9]+')->name('generos-destroy');
});


Route::prefix('artistas')->middleware('auth')->group(function (){
    Route::get('/', [ArtistasController::class, 'index'])-> name('artistas-index');
    Route::get('/create', [ArtistasController::class, 'create'])-> name('artistas-create');
    Route::post('/', [ArtistasController::class, 'store'])-> name('artistas-store');
    Route::get('/{id}/edit', [ArtistasController::class, 'edit'])->where('id', '[0-9]+')->name('artistas-edit');
    Route::put('/{id}', [ArtistasController::class, 'update'])->where('id', '[0-9]+')->name('artistas-update');
    Route::delete('/{id}', [ArtistasController::class, 'destroy'])->where('id', '[0-9]+')->name('artistas-destroy');
});


Route::prefix('idiomas')->middleware('auth')->group(function (){
    Route::get('/', [IdiomasController::class, 'index'])-> name('idiomas-index');
    Route::get('/create', [IdiomasController::class, 'create'])-> name('idiomas-create');
    Route::post('/', [IdiomasController::class, 'store'])-> name('idiomas-store');
    Route::get('/{id}/edit', [IdiomasController::class, 'edit'])->where('id', '[0-9]+')->name('idiomas-edit');
    Route::put('/{id}', [IdiomasController::class, 'update'])->where('id', '[0-9]+')->name('idiomas-update');
    Route::delete('/{id}', [IdiomasController::class, 'destroy'])->where('id', '[0-9]+')->name('idiomas-destroy');
});


Route::prefix('albuns')->middleware('auth')->group(function (){
    Route::get('/', [AlbunsController::class, 'index'])->name('albuns-index');
    Route::get('/create', [AlbunsController::class, 'create'])->name('albuns-create');
    Route::post('/', [AlbunsController::class, 'store'])->name('albuns-store');
    Route::get('/{id}/edit', [AlbunsController::class, 'edit'])->where('id', '[0-9]+')->name('albuns-edit');
    Route::put('/{id}', [AlbunsController::class, 'update'])->where('id', '[0-9]+')->name('albuns-update');
    Route::delete('/{id}', [AlbunsController::class, 'destroy'])->where('id', '[0-9]+')->name('albuns-destroy');
    
    
    Route::get('/artista/{artistaId}', [AlbunsController::class, 'getAlbunsByArtista'])
        ->where('artistaId', '[0-9]+')
        ->name('albuns-by-artista');
});


Route::prefix('musicas')->middleware('auth')->group(function (){
    Route::get('/', [MusicasController::class, 'index'])-> name('musicas-index');
    Route::get('/create', [MusicasController::class, 'create'])-> name('musicas-create');
    Route::post('/', [MusicasController::class, 'store'])-> name('musicas-store');
    Route::get('/{id}/edit', [MusicasController::class, 'edit'])->where('id', '[0-9]+')->name('musicas-edit');
    Route::put('/{id}', [MusicasController::class, 'update'])->where('id', '[0-9]+')->name('musicas-update');
    Route::delete('/{id}', [MusicasController::class, 'destroy'])->where('id', '[0-9]+')->name('musicas-destroy');
});


Route::resource('usuarios', UsersController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
