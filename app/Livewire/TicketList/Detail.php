<?php

namespace App\Livewire\TicketList;

use App\Models\Ticket;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use App\Models\TransaksiTiketFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket, $getFile;
    public $chatPerson, $gambar;

    public function mount($id)
    {
        $ticket = TransaksiTiket::find($id)
            ->with(['user', 'getKategori'])
            ->where('id', $id)
            ->get();
        $this->ticket = json_decode($ticket);

        $getChats = TransaksiTiketChat::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->get();
        $this->chatPerson = $getChats;

        $getGambar = TransaksiTiketFile::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->first();
        $this->gambar = $getGambar;

        $this->getFile = TransaksiTiket::getFile($id);
    }

    public function render()
    {
        return view('livewire.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => TransaksiTiket::with('user')
                ->where('user_id', Auth::user()->id)
                ->first(),
            'file'  => $this->getFile,
            'chat' => $this->chatPerson
        ]);
    }

    public function selesai($id)
    {
        TransaksiTiket::where('id', $id)
            ->update(['selesai' => Carbon::now()]);

        toast('Tiket sudah selesai', 'success');
        $this->redirectRoute('dashboard.detail', [
            'id' => $id
        ]);
    }

    public function terkait($id)
    {
        $this->redirectRoute('dashboard.tiket-terkait', [
            'id' => $id
        ]);
    }
}
