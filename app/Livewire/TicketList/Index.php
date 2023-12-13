<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use App\Models\TransaksiTiket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.ticket-list.index', [
            'ticket' => TransaksiTiket::with('kategori')
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate(5)
        ]);
    }
}
