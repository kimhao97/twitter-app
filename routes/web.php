<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserDashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaDashboardController;
use App\Http\Controllers\Admin\CommentController as AdminCommentDashboardController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('ideas')->group(function () {
    Route::post('', [IdeaController::class, 'store'])->name('ideas.create');

    Route::get('/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

    Route::middleware(['auth'])->group(function () {
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

        Route::put('/{idea}/update', [IdeaController::class, 'update'])->name('ideas.update');

        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

        Route::get('/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');
    });
});


Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.create');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('terms');
}) -> name('terms');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserDashboardController::class, 'index'])->name('users.dashboard');
    Route::get('/ideas', [AdminIdeaDashboardController::class, 'index'])->name('ideas.dashboard');
    Route::get('/comments', [AdminCommentDashboardController::class, 'index'])->name('comments.dashboard');
    Route::delete('/comments/{comment}', [AdminCommentDashboardController::class, 'destroy'])->name('comments.destroy');
});

