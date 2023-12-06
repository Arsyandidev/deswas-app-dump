<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard-auditor.ticket-list.index', [
            'ticket' => Ticket::with(['user', 'category'])
                // ->where('layers', 1)
                ->paginate(3)
        ]);
    }
}
