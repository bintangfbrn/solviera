<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Front\WebController;
use Illuminate\Support\Facades\Route;

// Front-end Routes
Route::get('/', [WebController::class, 'index'])->name('front.home');
Route::get('/about', [WebController::class, 'about'])->name('front.about');
Route::get('/services', [WebController::class, 'services'])->name('front.services');
Route::get('/projects', [WebController::class, 'projects'])->name('front.projects');
Route::get('/blog', [WebController::class, 'blog'])->name('front.blog');
Route::get('/gallery', [WebController::class, 'gallery'])->name('front.gallery');
Route::get('/faqs', [WebController::class, 'faqs'])->name('front.faqs');
Route::get('/contact', [WebController::class, 'contact'])->name('front.contact');
Route::post('/contact', [WebController::class, 'contactSubmit'])->name('front.contact.submit');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes (protected by authentication)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // RBAC Management Routes
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class)->except(['show']);
    Route::resource('users', UserController::class)->except(['show']);

    // CMS Pages Management Routes
    Route::resource('pages', PageController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
