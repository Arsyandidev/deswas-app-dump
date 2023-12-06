<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.ticket-list.index', [
            'ticket' => Ticket::with(['user', 'category'])
                ->where('user_id', Auth::user()->id)
                ->paginate(3)
        ]);
    }
}
