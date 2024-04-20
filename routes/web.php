<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/ideas', [IdeaController::class, 'store'] )->name('ideas.create');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'] )->name('ideas.show');
Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'] )->name('ideas.edit')->middleware('auth');
Route::put('/ideas/{idea}/update', [IdeaController::class, 'update'] )->name('ideas.update')->middleware('auth');
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'] )->name('ideas.destroy')->middleware('auth');

Route::get('/ideas/{idea}/comments', [CommentController::class, 'store'] )->name('ideas.comments.store')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.create');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms', function () {
    return view('terms');
});
// Route::get('/', function () {
//     return view('welcome');
// });
