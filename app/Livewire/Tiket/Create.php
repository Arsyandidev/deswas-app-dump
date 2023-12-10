<?php

namespace App\Livewire\Tiket;

use App\Models\ParameterKategori;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketChat;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use App\Models\TransaksiTiketProses;
use App\Models\TransaksiTiketStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $kategori, $user_id;
    public $judul, $deskripsi;
    public $pengajuan, $telaah, $jawaban, $selesai;

    public function rules(): array
    {
        return [
            'kategori'      => ['required'],
            'judul'         => ['required'],
            'deskripsi'     => ['required']
        ];
    }

    public function render()
    {
        $category           = ParameterKategori::all();
        return view('livewire.tiket.create', [
            'category'      => json_decode($category)
        ]);
    }

    public function store()
    {
        $this->validate();

        $ticket = TransaksiTiket::create([
            'kategori'      => $this->kategori,
            'judul'         => $this->judul,
            'deskripsi'     => $this->deskripsi,
            'pengajuan'     => Carbon::now(),
            'user_id'       => Auth::user()->id
        ]);

        if ($ticket) {
            TransaksiTiketChat::create([
                'id_transaksi_tiket' => $ticket->id
            ]);

            TransaksiTiketStatus::create([
                'id_transaksi_tiket' => $ticket->id
            ]);
        }

        toast('Berhasil membuat tiket pertanyaan.', 'success');

        return redirect()
            ->route('dashboard.ticket-list');
    }
}
