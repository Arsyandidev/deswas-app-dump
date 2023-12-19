<?php

namespace App\Livewire\DashboardInspektur\TicketList;

use App\Models\TransaksiTiket;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard-inspektur.ticket-list.index', [
            'ticket'    => TransaksiTiket::with('getKategori')
                ->orderBy('id', 'desc')
                ->where('jawaban', '!=', null)
                ->paginate(5)
        ]);
    }
}
