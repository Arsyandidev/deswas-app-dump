<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use App\Models\TransaksiTiketFile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket;
    public $chatPerson, $gambar;

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

        $getGambar = TransaksiTiketFile::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->get();
        $this->gambar = $getGambar;
    }

    public function render()
    {
        return view('livewire.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => TransaksiTiket::with('user')
                ->where('user_id', Auth::user()->id)
                ->first(),
            'file'  => $this->gambar,
            'chat' => $this->chatPerson
        ]);
    }
}
