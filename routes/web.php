<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialMedia\SocialMediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth', 'verified', 'checkRole:admin,author'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Partie categorie
Route::resource('/category', CategoryController::class)->middleware('admin');

//Partie articles
Route::resource('/article', ArticleController::class);

//Partie author
Route::resource('/author', UserController::class)->middleware('admin');

//Partie reseaux seciaux
Route::resource('/social', SocialMediaController::class)->middleware('admin');

// Partie parametres
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index')->middleware('admin');
Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update')->middleware('admin');

require __DIR__ . '/auth.php';
