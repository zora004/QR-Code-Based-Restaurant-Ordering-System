<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\TableController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');

// Menu Item Routes
Route::get('menus', [MenuItemController::class, 'index'])->name('menus.index')->middleware('auth');
Route::post('menus', [MenuItemController::class, 'store'])->name('menus.store')->middleware('auth');
Route::get('menus/data', [MenuItemController::class, 'getData'])->name('menus.data');

// Table Routes
Route::get('tables', [TableController::class, 'index'])->name('tables.index')->middleware('auth');
Route::post('tables', [TableController::class, 'store'])->name('tables.store')->middleware('auth');
Route::get('tables/data', [TableController::class, 'getData'])->name('tables.data');
Route::get('/tables/{uuid}/view', [TableController::class, 'view'])->name('tables.view');

// Dashboard Route
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');



