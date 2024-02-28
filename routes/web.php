<?php

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', App\Livewire\Pages\Admin\Dashboard\Index::class)->name('admin.dashboard');
    Route::get('/user', App\Livewire\Pages\Admin\User\Index::class)->name('admin.user');
    Route::get('/module', App\Livewire\Pages\Admin\Module\Index::class)->name('admin.module');
    Route::get('/roles-permission', App\Livewire\Pages\Admin\RolesPermission\Index::class)->name('admin.roles-permission');
});
