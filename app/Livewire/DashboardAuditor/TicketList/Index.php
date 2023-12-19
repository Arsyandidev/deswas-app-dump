<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\TransaksiTiket;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard-auditor.ticket-list.index', [
            'ticket'    => TransaksiTiket::with('getKategori')
                ->orderBy('id', 'desc')
                ->paginate(5)
        ]);
    }
}
