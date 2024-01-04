<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\ParameterKategori;
use App\Models\Ticket;
use App\Models\TicketChat;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChart;
use App\Models\TransaksiTiketChat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket, $getChat, $ticketChat, $chatPerson;
    public $researchName, $getProses, $getUser, $getTelaah, $getInspektur, $getFile;
    public $ubahJudul, $ubahKategori, $selectedItemId;
    public $selectedCategoriId;

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
        $this->getInspektur = TransaksiTiket::getNamaInspektur($id);
        $this->getFile = TransaksiTiket::getFile($id);
    }

    public function render()
    {
        $category           =  ParameterKategori::all();
        $selectedItemId     = $this->selectedItemId;

        return view('livewire.dashboard-auditor.ticket-list.detail', [
            'ticket'        => $this->ticket,
            'telaahName'    => $this->getTelaah,
            'inspekturName'  => $this->getInspektur,
            'user'          => $this->getUser,
            'proses'        => $this->getProses,
            'chat'          => $this->chatPerson,
            'file'          => $this->getFile,
            'category'      => $category,
            'selectedItemId' => $selectedItemId
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

    public function updateCategory($id, $categoryId)
    {
        $this->selectedCategoriId = $categoryId;
        TransaksiTiket::where('id', $id)
            ->update([
                'kategori'      => $categoryId
            ]);

        toast('Kategori telah di sesuaikan.', 'success');
        $this->redirectRoute('dashboard.auditor.detail', [
            'id' => $id
        ]);
    }

    public function telaah($id)
    {
        TransaksiTiket::where('id', $id)
            ->update([
                'telaah'        => Carbon::now(),
                'user_telaah'   => Auth::user()->id
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

        if (TransaksiTiketChart::where('id', 1)->exists()) {
            TransaksiTiketChart::where('id', 1)
                ->update([
                    'rendah' => 0 + 1
                ]);
        }
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
