<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\DashboardAuditor\Index as DashboardAuditorIndex;
use App\Livewire\DashboardAuditor\TicketList\Detail as DashboardAuditorDetail;
use App\Livewire\DashboardAuditor\TicketList\Index as DashboardAuditorTicketListIndex;
use App\Livewire\DashboardInspektur\Index as DashboardInspekturIndex;
use App\Livewire\DashboardInspektur\TicketList\Detail as DashboardInspekturDetail;
use App\Livewire\DashboardInspektur\TicketList\Index as DashboardInspekturTicketListIndex;
use App\Livewire\Front\Index;
use App\Livewire\TicketList\Detail as TicketDetail;
use App\Livewire\TicketList\Index as TicketListIndex;
use App\Livewire\Tiket\Create as TiketCreate;
use App\Livewire\TiketTerkait\Index as TiketTerkaitIndex;
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
    Route::get('/tiket-terkait/{id}', TiketTerkaitIndex::class)->name('tiket-terkait');

    Route::middleware('auditor')->name('auditor.')->group(function () {
        Route::get('/auditor', DashboardAuditorIndex::class)->name('index');
        Route::get('/auditor/ticket-list', DashboardAuditorTicketListIndex::class)->name('ticket-list');
        Route::get('/auditor/ticket-list/detail/{id}', DashboardAuditorDetail::class)->name('detail');
    });

    Route::middleware('inspektur')->name('inspektur.')->group(function () {
        Route::get('/inspektur', DashboardInspekturIndex::class)->name('index');
        Route::get('/inspektur/ticket-list', DashboardInspekturTicketListIndex::class)->name('ticket-list');
        Route::get('/inspektur/ticket-list/detail/{id}', DashboardInspekturDetail::class)->name('detail');
    });
});
