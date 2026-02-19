<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Tambahkan di bagian PUBLIC ROUTES
Route::get('/about', function () {
    $waNumber = \App\Models\Setting::get('whatsapp_number', '628123456789');
    return view('about', compact('waNumber'));
})->name('about');

// ================= PUBLIC ROUTES =================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog', [HomeController::class, 'catalog'])->name('catalog');

// ================= AUTH ROUTES =================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Quick actions untuk harga & highlight (pakai update method yang sudah ada)
Route::post('/admin/items/{item}/toggle-highlight', [ItemController::class, 'toggleHighlight'])->name('admin.items.toggle-highlight');
Route::post('/admin/items/{item}/update-price', [ItemController::class, 'updatePrice'])->name('admin.items.update-price');

// ================= ADMIN ROUTES =================
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/', [ItemController::class, 'index'])->name('dashboard');

    // Settings WhatsApp
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // admin middleware
    Route::patch('/admin/items/{item}/quick-update', [ItemController::class, 'quickUpdate'])->name('admin.items.quick-update');

    // CRUD Items (Resource Route - Otomatis membuat: index, create, store, edit, update, destroy)
    Route::resource('items', ItemController::class);

});