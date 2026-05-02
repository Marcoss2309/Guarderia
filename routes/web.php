<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::resource('personas',App\Http\Controllers\PersonaController::class);
Route::resource('familiares',App\Http\Controllers\FamiliarController::class);
Route::resource('platos',App\Http\Controllers\PlatoController::class)  ->parameters([
        'platos' => 'plato' // Changes {user} to {username}
    ]);
Route::resource('centros',App\Http\Controllers\CentroController::class);
Route::resource('ingredientes',App\Http\Controllers\IngredienteController::class);
Route::resource('menus',App\Http\Controllers\MenuController::class);
Route::resource('ninios',App\Http\Controllers\NinioController::class);
Route::resource('parentescos',App\Http\Controllers\ParentescoController::class);
Route::resource('abonos', App\Http\Controllers\AbonoController::class);


