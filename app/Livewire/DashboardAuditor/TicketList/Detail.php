<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\Ticket;
use App\Models\TicketChat;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket, $getChat, $ticketChat, $chatPerson;
    public $researchName, $getProses;

    public function mount($id)
    {
        $ticket = TransaksiTiket::find($id)
            ->with(['user', 'kategori'])
            ->where('id', $id)
            ->get();
        $this->ticket = json_decode($ticket);

        $rname = Ticket::getUserResearch();
        $this->researchName = $rname;

        $getChats = TransaksiTiketChat::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->get();
        $this->chatPerson = $getChats;
    }

    public function render()
    {
        return view('livewire.dashboard-auditor.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => TransaksiTiket::with('user')
                ->get(),
            'proses' => $this->getProses,
            'chat' => $this->chatPerson
        ]);
    }

    public function telaah($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'telaah' => Carbon::now(),
                'user_telaah' => Auth::user()->id
            ]);

        toast('Tiket di Telaah.', 'success');
        $this->redirectRoute('dashboard.auditor.detail', [
            'id' => $id
        ]);
    }

    public function firstLayer($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'resiko' => 'Rendah'
            ]);

        toast('Pertanyaan diajukan untuk Layer 1', 'success');
        $this->redirectRoute('dashboard.auditor.detail', ['id' => $id]);
    }

    public function secondLayer($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'resiko' => 'Tinggi',
                'layers' => 2
            ]);

        toast('Pertanyaan diajukan untuk Layer 2', 'success');
        $this->redirectRoute('dashboard.auditor.detail', [
            'id' => $id
        ]);
    }

    public function chat($id)
    {
        TransaksiTiketChat::where('id_transaksi_tiket', $id)
            ->update([
                'chat' => $this->getChat
            ]);

        toast('Tanggapan sudah di kirim', 'success');
        $this->redirectRoute('dashboard.auditor.detail', [
            'id' => $id
        ]);
    }
}
