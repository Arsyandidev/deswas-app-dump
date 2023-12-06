<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use Livewire\Component;

class Detail extends Component
{
    public $ticket;
    public $researchName;

    public function mount($id)
    {
        $get = Ticket::find($id);
        $this->ticket = json_decode($get);

        $rname = Ticket::getUserResearch();
        $this->researchName = $rname;
    }

    public function render()
    {
        return view('livewire.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => Ticket::with('user')
                ->first(),
            'research' => $this->researchName
        ]);
    }
}
