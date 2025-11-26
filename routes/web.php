<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/app', function () {
    return view('layout.app');
});

// KELOMPOK TAMU (Hanya bisa diakses orang yang BELUM login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
}); 

// KELOMPOK MEMBER (Hanya bisa diakses orang yang SUDAH login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Nanti fitur beli tiket akan ditaruh di sini
    Route::get('/history', [OrderController::class, 'history'])->name('order.history');
});

// KELOMPOK ADMIN (Hanya bisa diakses oleh role 'admin')
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    
    // Dashboard Admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // Manajemen Order
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    // Aksi Approve Order
    Route::patch('/orders/{order}/approve', [AdminController::class, 'approveOrder'])->name('admin.orders.approve');
});

Route::get('/checkout/{ticket}', [OrderController::class, 'checkout'])->name('order.checkout');

Route::post('/checkout/{ticket}', [OrderController::class, 'store'])->name('order.store');

// 1. Route Publik (Bisa diakses siapa saja)
Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimonials.index');

// 2. Route Member (Harus Login untuk nulis)
Route::middleware('auth')->group(function () {
    Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimonials.store');
});

// Manajemen Testimoni
Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
Route::patch('/testimonials/{testimonial}/approve', [AdminController::class, 'approveTestimonial'])->name('admin.testimonials.approve');
Route::delete('/testimonials/{testimonial}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');

// 1. ROUTE PUBLIK (Galeri bisa dilihat semua orang)
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// 2. ROUTE ADMIN (Upload & Hapus)
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    // ... route admin dashboard & orders yang sudah ada ...

    // Route Galeri Admin
    Route::get('/gallery', [GalleryController::class, 'adminIndex'])->name('admin.gallery');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
});