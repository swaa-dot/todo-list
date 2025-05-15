<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodolistController;
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

Route::middleware('auth')->group(function(){
Route::resource('/todolist', TodolistController::class);
Route::get('/todolist', [TodolistController::class, 'index'])->name('todolists.index');
Route::post('/todolist', [TodolistController::class, 'store'])->name('todolists.store');
Route::get('/todolist/create', [TodolistController::class, 'create'])->name('todolists.create');
Route::get('/todolists/create', [TodolistController::class, 'create'])->name('todolists.create');
Route::post('/todolists', [TodolistController::class, 'store'])->name('todolists.store');
Route::get('/todolists/{id}/edit', [TodolistController::class, 'edit'])->name('todolists.edit');
Route::put('/todolists/{id}', [TodolistController::class, 'update'])->name('todolists.update');
Route::delete('/todolists/{id}', [TodolistController::class, 'destroy'])->name('todolists.destroy');
    // Route::post('/todolists', [TodolistController::class, 'store'])->name('todolists.store');
});
 
require __DIR__.'/auth.php';
