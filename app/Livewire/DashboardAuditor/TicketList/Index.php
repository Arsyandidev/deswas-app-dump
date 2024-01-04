<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\TransaksiTiket;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $currentTime, $timers;

    public function render()
    {
        return view('livewire.dashboard-auditor.ticket-list.index', [
            'ticketLayer1'    => TransaksiTiket::with('getKategori')
                ->orderBy('id', 'desc')
                ->paginate(5),
            'ticketLayer2'    => TransaksiTiket::with(['user', 'getKategori'])
                ->where('layers', 2)
                ->orderBy('id', 'desc')
                ->paginate(5),
        ]);
    }
}
