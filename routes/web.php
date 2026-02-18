<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/contact', [LandingController::class, 'contact'])->name('contact.store');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Public Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');


/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes — Protected by auth + admin middleware
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Service Management
    Route::resource('services', ServiceController::class)->except(['show']);

    // Project Management
    Route::resource('projects', ProjectController::class)->except(['show']);

    // Blog Management
    Route::resource('blog', AdminBlogController::class)->except(['show']);

    // Social Links
    Route::get('/social-links', [SocialLinkController::class, 'index'])->name('social-links.index');
    Route::post('/social-links', [SocialLinkController::class, 'store'])->name('social-links.store');
    Route::put('/social-links/{socialLink}', [SocialLinkController::class, 'update'])->name('social-links.update');
    Route::delete('/social-links/{socialLink}', [SocialLinkController::class, 'destroy'])->name('social-links.destroy');

    // Contact Management
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
