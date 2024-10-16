<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/welcome', function () {return view('welcome');})->name('welcome');    
    Route::post('logout', function () {Auth::logout();return redirect('/');})->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::delete('/profile/media/{id}', [ProfileController::class, 'deleteMedia'])->name('profile.media.delete')->middleware('auth');
    Route::post('/profile/update-bio', [ProfileController::class, 'updateBio'])->name('profile.update-bio');
    Route::post('/profile/upload', [ProfileController::class, 'uploadMedia'])->name('profile.upload');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/settings', [ProfileController::class, 'updateSettings'])->name('profile.update-settings');
    Route::put('/profile/media/{id}', [ProfileController::class, 'updateMedia'])->name('profile.media.update')->middleware('auth');
    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index');
    Route::post('/archive/download', [ArchiveController::class, 'download'])->name('archive.download');
    // Route::get('/', function () {return view('welcome');});
    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
