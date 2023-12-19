<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\ParameterKategori;
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
    public $researchName, $getProses, $getUser, $getTelaah, $getFile;
    public $ubahJudul, $ubahKategori;

    public function mount($id)
    {
        $ticket             = TransaksiTiket::find($id)
            ->with(['user', 'getKategori'])
            ->where('id', $id)
            ->get();
        $this->ticket       = json_decode($ticket);

        $rname = Ticket::getUserResearch();
        $this->researchName = $rname;

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
        $category           =  ParameterKategori::all();

        return view('livewire.dashboard-auditor.ticket-list.detail', [
            'ticket'        => $this->ticket,
            'telaahName'    => $this->getTelaah,
            'user'          => $this->getUser,
            'proses'        => $this->getProses,
            'chat'          => $this->chatPerson,
            'file'          => $this->getFile,
            'category'      => json_decode($category)
        ]);
    }

    public function ubahJudulForm($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'judul' => $this->ubahJudul
            ]);

        toast('Judul berhasil diubah oleh Auditor', 'success');
        $this->redirectRoute('dashboard.auditor.detail', [
            'id' => $id
        ]);
    }

    public function telaah($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'telaah'        => Carbon::now(),
                'user_telaah'   => Auth::user()->id,
                'kategori'      => $this->ubahKategori
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

        TransaksiTiket::where('id', $id)
            ->update([
                'jawaban' => Carbon::now()
            ]);

        toast('Tanggapan sudah di kirim', 'success');
        $this->redirectRoute('dashboard.auditor.detail', [
            'id' => $id
        ]);
    }
}
