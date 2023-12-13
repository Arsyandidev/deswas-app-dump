<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket;
    public $chatPerson;

    public function mount($id)
    {
        $ticket = TransaksiTiket::find($id)
            ->with(['user', 'kategori'])
            ->where('id', $id)
            ->get();
        $this->ticket = json_decode($ticket);

        $getChats = TransaksiTiketChat::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->get();
        $this->chatPerson = $getChats;
    }

    public function render()
    {
        return view('livewire.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => TransaksiTiket::with('user')
                ->where('user_id', Auth::user()->id)
                ->first(),
            'chat' => $this->chatPerson
        ]);
    }
}
