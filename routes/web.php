<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [PageController::class, 'login'])->name('login');

Route::post('/login', [PageController::class, 'authenticate']);

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

Route::post('/logout', [PageController::class, 'logout'])->name('logout');

Route::get('/pengelolaan', [PageController::class, 'katalog'])->name('pengelolaan');
Route::get('/pengelolaan/tambah', [PageController::class, 'tambahdata'])->name('tambah');
Route::post('pengelolaan/submit', [PageController::class, 'submit'])->name('submit');
Route::get('/pengelolaan/edit/{id}', [PageController::class, 'editdata'])->name('edit');
Route::post('/pengelolaan/update/{id}', [PageController::class, 'updatedata'])->name('update');
Route::delete('/pengelolaan/delete/{id}', [PageController::class, 'deletedata'])->name('delete');

Route::get('/profile', [PageController::class, 'profile'])->name('profile');
