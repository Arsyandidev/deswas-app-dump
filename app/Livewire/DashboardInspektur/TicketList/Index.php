<?php

namespace App\Livewire\DashboardInspektur\TicketList;

use App\Models\TransaksiTiket;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard-inspektur.ticket-list.index', [
            'ticketLayer1'    => TransaksiTiket::with('getKategori')
                ->where('jawaban', '!=', null)
                ->orderBy('id', 'desc')
                ->paginate(5),
        ]);
    }
}
