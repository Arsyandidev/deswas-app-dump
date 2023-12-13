<?php

namespace App\Livewire\DashboardInspektur\TicketList;

use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use Livewire\Component;

class Detail extends Component
{
    public $ticket, $getChat, $ticketChat, $chatPerson;
    public $researchName, $getProses, $getUser, $getTelaah;

    public function mount($id)
    {
        $ticket             = TransaksiTiket::find($id)
            ->with(['user', 'kategori'])
            ->where('id', $id)
            ->get();
        $this->ticket       = json_decode($ticket);

        $getChats = TransaksiTiketChat::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->get();
        $this->chatPerson   = $getChats;

        $user               = TransaksiTiket::with('user')
            ->where('id', $id)
            ->get();
        $this->getUser = json_decode($user);
    }

    public function render()
    {
        return view('livewire.dashboard-inspektur.ticket-list.detail', [
            'ticket'        => $this->ticket,
            'telaahName'    => TransaksiTiket::getNamaTelaah(),
            'user'          => $this->getUser,
            'proses'        => $this->getProses,
            'chat'          => $this->chatPerson
        ]);
    }

    public function setuju($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'setuju' => 1
            ]);
        toast('Pertanyaan berhasil di setujui', 'success');
        return redirect()->route('dashboard.inspektur.ticket-list');
    }
}
