<?php

use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Mail\NewUserWelcomeMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::get('/', [PostController::class, 'index']);
Route::get('/p/create', [PostController::class, 'create'])->name('post.create');
Route::post('/p', [PostController::class, 'store'])->name('post.store');
Route::get('/p/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/profiles/{user}', [ProfilesController::class, 'index'])->name('dashboard');
Route::get('/profiles/{user}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');
Route::patch('/profiles/{user}', [ProfilesController::class, 'update'])->name('profiles.update');

Route::post('/follow/{user}', [FollowsController::class, 'store'])->name(('follow.store'));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
