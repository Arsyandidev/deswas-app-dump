<?php

namespace App\Livewire\DashboardInspektur\TicketList;

use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use Livewire\Component;

class Detail extends Component
{
    public $ticket, $getChat, $ticketChat, $chatPerson;
    public $getProses, $getUser, $ubahChat;
    public $getTelaah, $getFile;
    public $ubahJudul;

    public function mount($id)
    {
        $ticket             = TransaksiTiket::find($id)
            ->with(['user', 'getKategori'])
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

        $this->getTelaah = TransaksiTiket::getNamaTelaah($id);
        $this->getFile = TransaksiTiket::getFile($id);
    }

    public function render()
    {
        return view('livewire.dashboard-inspektur.ticket-list.detail', [
            'ticket'        => $this->ticket,
            'telaahName'    => $this->getTelaah,
            'file'          => $this->getFile,
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
        $this->redirectRoute('dashboard.inspektur.detail', [
            'id' => $id
        ]);
    }

    public function ubah($id)
    {
        TransaksiTiketChat::where('id_transaksi_tiket', $id)
            ->update([
                'chat' => $this->ubahChat,
            ]);

        TransaksiTiket::where('id', $id)
            ->update([
                'setuju' => 1
            ]);

        toast('Jawaban auditor berhasil di perbaiki.', 'success');
        $this->redirectRoute('dashboard.inspektur.detail', [
            'id' => $id
        ]);
    }

    public function ubahJudulForm($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'judul' => $this->ubahJudul
            ]);

        toast('Judul berhasil diubah oleh Auditor', 'success');
        $this->redirectRoute('dashboard.inspektur.detail', [
            'id' => $id
        ]);
    }

    public function tolak($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'setuju' => 0
            ]);

        toast('Ditolak.', 'success');
        $this->redirectRoute('dashboard.inspektur.detail', [
            'id' => $id
        ]);
    }
}
