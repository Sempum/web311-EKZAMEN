<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectorController;
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

// Main site -------------------------------------------------
Route::get('/', [AppController::class, 'index'])->name('app.index');
Route::get('about', [AppController::class, 'about'])->name('app.about');
Route::get('contact', [AppController::class, 'contact'])->name('app.contacts');
Route::get('sectors', [AppController::class, 'sectors'])->name('app.sectors');
Route::get('privacy', [AppController::class, 'privacy'])->name('app.privacy');
Route::get('sectors/{sectorSlug}', [AppController::class, 'sectorBySlug'])->name('app.sectorBySlug');
Route::get('categories/{categorySlug}', [AppController::class, 'categoryBySlug'])->name('app.categoryBySlug');
Route::get('search/category', [AppController::class, 'searchCategory'])->name('app.searchCategory');
Route::get('search/{categorySlug}/products', [AppController::class, 'searchProduct'])->name('app.searchProduct');
Route::get('documentMain/create', [DocumentController::class, 'createMain'])->name('app.doc.create')->middleware('role_or_permission:user|manage documents');
Route::post('documentMain/create', [DocumentController::class, 'storeMain'])->name('app.doc.store')->middleware('role_or_permission:user|manage documents');
// Report -----------------------------------------------
Route::post('report/create', [ReportController::class, 'storeReport'])->name('app.report.store');
Route::delete('report/{report}', [ReportController::class, 'fixReport'])->name('report.fix')->middleware('role:admin|moderator');

// Admin --------------------------------
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth', 'role:admin|moderator')->name('admin.dashboard');

// CRUD Sector ---------------------------------------
Route::resource('sector', SectorController::class)->middleware('role_or_permission:moderator|admin|manage sectors');

// CRUD Category -------------------------------------
Route::resource('category', CategoryController::class)->middleware('role_or_permission:moderator|admin|manage categories');
Route::get('category/{category}/removeImage', [CategoryController::class, 'removeImage'])->name('admin.categories.removeImage')->middleware('role_or_permission:moderator|admin|manage categories');

// CRUD Product -------------------------------------
Route::resource('products', ProductController::class)->middleware('role_or_permission:moderator|admin|manage products');
Route::get('products/{product}/removeImage', [ProductController::class, 'removeImage'])->name('admin.products.removeImage')->middleware('role_or_permission:moderator|admin|manage products');

// CRUD Documents -------------------------------------
Route::resource('documents', DocumentController::class)->middleware('role_or_permission:moderator|admin|manage documents');
Route::post('documents/{document}/approve', [DocumentController::class, 'approveDoc'])->name('admin.approveDoc')->middleware('role_or_permission:moderator|admin|manage documents');

// CRUD Role -------------------------------------
Route::resource('roles', RoleController::class)->middleware('role_or_permission:admin|manage users');

// CRUD User -------------------------------------
Route::resource('users', UserController::class)->middleware('role_or_permission:admin|manage users');
Route::post('users/{user}/ban', [UserController::class, 'ban'])->name('admin.ban.user')->middleware('role_or_permission:admin|manage users');
Route::post('users/{user}/unban', [UserController::class, 'unban'])->name('admin.unban.user')->middleware('role_or_permission:admin|manage users');

// CRUD Permission -------------------------------------
Route::resource('permissions', PermissionController::class)->middleware('role_or_permission:admin|manage users');

// Register -------------------------------------------------------
Route::get('register', [AuthController::class, 'registerIndex'])->middleware('guest')->name('auth.registerIndex');
Route::post('register', [AuthController::class, 'register'])->middleware('guest')->name('auth.register');
Route::get('ajax/getCaptchaCode/{captcha}', [AuthController::class, 'getCode'])->name('ajax.getCaptchaCode');

// Login -------------------------------------------------------
Route::get('login', [AuthController::class, 'loginIndex'])->middleware('guest')->name('auth.loginIndex');
Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');

// Logout -------------------------------------------------------
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
