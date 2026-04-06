<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ReservationAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Products (Caftans & Accessories)
Route::get('/caftans', [ProductController::class, 'caftans'])->name('caftans');
Route::get('/accessoires', [ProductController::class, 'accessoires'])->name('accessoires');
Route::get('/produits/filtre', [ProductController::class, 'filter'])->name('products.filter');
Route::get('/produit/{id}', [ProductController::class, 'show'])->name('product.show');

// Forfaits
Route::get('/forfaits', [ForfaitController::class, 'index'])->name('forfaits');
Route::get('/forfait/{id}', [ForfaitController::class, 'show'])->name('forfait.show');

// Gallery & Testimonials
Route::get('/galerie', function () {
    return view('pages.gallery');
})->name('gallery');

Route::get('/temoignages', function () {
    return view('pages.testimonials');
})->name('testimonials');

// Contact (Public)
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Client Routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('client.profile');
    })->name('profile');

    Route::get('/profile/edit', function () {
        return view('client.profile-edit');
    })->name('profile.edit');

    Route::put('/profile', function () {
        $user = auth()->user();
        $user->update([
            'name' => request('name'),
            'phone' => request('phone'),
            'city' => request('city'),
        ]);
        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès!');
    })->name('profile.update');

    // Reservations (Protected)
    Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservation/confirmation', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');
    Route::get('/reservation/available-dates/{productId}', [ReservationController::class, 'getAvailableDates'])->name('reservation.available-dates');

    Route::get('/my-reservations', [ReservationController::class, 'myReservations'])->name('reservations.my');
});

// Admin Routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Catalog Management
    Route::resource('catalog', CatalogController::class);
    Route::get('/catalog/categories', [CatalogController::class, 'categories'])->name('catalog.categories');
    Route::post('/catalog/categories', [CatalogController::class, 'storeCategory'])->name('catalog.storeCategory');
    Route::delete('/catalog/categories/{category}', [CatalogController::class, 'destroyCategory'])->name('catalog.destroyCategory');

    // Client Management
    Route::resource('cliente', ClientController::class, ['except' => ['show']]);
    Route::get('/clientes/export', [ClientController::class, 'export'])->name('clientes.export');

    // Reservations Management
    Route::resource('reservations', ReservationAdminController::class, ['only' => ['index', 'show', 'destroy']]);
    Route::post('/reservations/{reservation}/status', [ReservationAdminController::class, 'updateStatus'])->name('reservations.updateStatus');
    Route::post('/reservations/{reservation}/cancel', [ReservationAdminController::class, 'cancel'])->name('reservations.cancel');
    Route::get('/reservations/filter', [ReservationAdminController::class, 'filter'])->name('reservations.filter');
    Route::get('/reservations/export', [ReservationAdminController::class, 'export'])->name('reservations.export');
});
