<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Ruta para mostrar los usuarios en una vista
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::resource('users', UserController::class);

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
});