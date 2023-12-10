<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use App\Models\TransaksiTiket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket;
    public $researchName;

    public function mount($id)
    {
        $get = TransaksiTiket::find($id);
        $this->ticket = json_decode($get);

        $rname = Ticket::getUserResearch();
        $this->researchName = $rname;
    }

    public function render()
    {
        return view('livewire.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => TransaksiTiket::with('user')
                ->where('user_id', Auth::user()->id)
                ->first(),
            'research' => $this->researchName
        ]);
    }
}
