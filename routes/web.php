<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;

// =====================
// HALAMAN PUBLIK
// =====================

// Beranda Blog
Route::get('/', [PublicController::class, 'index'])->name('blog.index');

// Detail Artikel
Route::get('/blog/{slug}', [PublicController::class, 'show'])->name('blog.show');

// =====================
// DASHBOARD
// =====================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// =====================
// HALAMAN YANG HARUS LOGIN
// =====================

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Kategori
    Route::resource('categories', CategoryController::class);

    // CRUD Artikel
    Route::resource('articles', ArticleController::class);

});

require __DIR__.'/auth.php';