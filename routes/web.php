<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\DashboardAuditor\Index as DashboardAuditorIndex;
use App\Livewire\DashboardAuditor\TicketList\Detail as DashboardAuditorDetail;
use App\Livewire\DashboardAuditor\TicketList\Index as DashboardAuditorTicketListIndex;
use App\Livewire\Front\Index;
use App\Livewire\TicketList\Detail as TicketDetail;
use App\Livewire\TicketList\Index as TicketListIndex;
use App\Livewire\Tiket\Create as TiketCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('home');
Route::get('/tiket', TiketCreate::class)->name('tiket');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', DashboardIndex::class)->name('index');
    Route::get('/ticket-list', TicketListIndex::class)->name('ticket-list');
    Route::get('/ticket-list/detail/{id}', TicketDetail::class)->name('detail');

    Route::middleware('auditor')->name('auditor.')->group(function () {
        Route::get('/auditor', DashboardAuditorIndex::class)->name('index');
        Route::get('/auditor/ticket-list', DashboardAuditorTicketListIndex::class)->name('ticket-list');
        Route::get('/auditor/ticket-list/detail/{id}', DashboardAuditorDetail::class)->name('detail');
    });
});
