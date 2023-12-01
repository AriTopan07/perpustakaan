<?php

use App\Http\Controllers\BookshelvesController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TempImagesController;
use App\Http\Controllers\AksiController;
use App\Http\Controllers\AplikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;

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

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::get('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // Aplikasi
    Route::get('/pengaturan-aplikasi', [AplikasiController::class, 'index'])->name('pengaturan-apikasi.index');
    Route::post('/pengaturan-apllikasi/update', [AplikasiController::class, 'update'])->name('pengaturan-aplikasi.update');

    // Temp Images
    Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/change-status/{id}', [UserController::class, 'changeStatus'])->name('change-status');


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('users/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('users.update-password');

    // Group
    Route::get('/group', [GroupController::class, 'index'])->name('group.index');
    Route::post('/group', [GroupController::class, 'store'])->name('group.store');
    Route::delete('/group/{id}', [GroupController::class, 'destroy'])->name('group.delete');

    // Section
    Route::get('/aksi', [AksiController::class, 'index'])->name('aksi.index');

    // Menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('/menu/create-section', [MenuController::class, 'create_section'])->name('menu.create-section');
    Route::post('/menu', [MenuController::class, 'create_menu'])->name('menu.store');
    Route::get('/menu/detail-section/{id}', [MenuController::class, 'detail_section']);
    Route::get('/menu/detail-menu/{id}', [MenuController::class, 'detail_menu']);
    Route::put('/menu/update-section/{id}', [MenuController::class, 'update_section'])->name('menu.update-section');
    Route::put('/menu/update-menu/{id}', [MenuController::class, 'update_menu'])->name('menu.update-menu');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy_menu'])->name('menu.delete');
    Route::delete('/menu/delete-section/{id}', [MenuController::class, 'destroy_section'])->name('menu.delete-section');

    // Permission
    Route::get('permission/data-akses/{id}', [PermissionController::class, 'data_akses'])->name('permission.data-akses');
    Route::post('permission/data-akses/edit_akses', [PermissionController::class, 'edit_akses'])->name('permission.edit-akses');
    Route::post('permission/data-akses/all_access', [PermissionController::class, 'all_access'])->name('permission.all-akses');

    // Buku
    Route::get('/buku', [BookController::class, 'index'])->name('buku.index');

    // Rak Buku
    Route::get('/rak-buku', [BookshelvesController::class, 'list'])->name('rak-buku.list');
});
