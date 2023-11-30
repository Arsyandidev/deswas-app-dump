<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Front\Index;
use App\Livewire\Tiket\Create as TiketCreate;
use App\Livewire\Tiket\Index as TiketIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/tiket', TiketCreate::class)->name('tiket');

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', DashboardIndex::class)->name('index');
});
