<?php

use Illuminate\Support\Facades\Route;

// Public Page Controllers
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TagController;

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

// --- PUBLIC VISITOR ROUTES ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/blog', [PageController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{post:slug}', [PageController::class, 'blogShow'])->name('blog.show');

// --- ADMIN PANEL ROUTES ---
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management Routes
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

    // About Me Management Routes
    Route::get('/about', [AdminAboutController::class, 'edit'])->name('about.edit');
    Route::patch('/about', [AdminAboutController::class, 'update'])->name('about.update');

    // Project Management (CRUD)
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('tags', TagController::class)->except(['show']); // Add this line

    // Post Management (CRUD)
    Route::resource('posts', PostController::class); // Add thiss
});


// --- AUTHENTICATION ROUTES (From Laravel Breeze) ---
require __DIR__ . '/auth.php';
