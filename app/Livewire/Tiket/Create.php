<?php

namespace App\Livewire\Tiket;

use App\Models\ParameterKategori;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketChat;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use App\Models\TransaksiTiketFile;
use App\Models\TransaksiTiketProses;
use App\Models\TransaksiTiketStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $kategori, $user_id;
    public $judul, $deskripsi, $gambar;
    public $pengajuan, $telaah, $jawaban, $selesai;

    public function rules(): array
    {
        return [
            'kategori'      => ['required'],
            'judul'         => ['required'],
            'deskripsi'     => ['required'],
            'gambar'        => ['nullable', 'sometimes'],
        ];
    }

    private function resetInput()
    {
        $this->judul = null;
        $this->deskripsi = null;
        $this->gambar = null;
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

            $filename = $this->gambar ? $this->gambar->getClientOriginalName() : null;
            TransaksiTiketFile::create([
                'id_transaksi_tiket'    => $ticket->id,
                'path'                  => $this->gambar ? $this->gambar->storeAs('path', $filename, 'public') : null,
                'type'                  => $this->gambar->getMimeType()
            ]);
        }

        $this->resetInput();
        toast('Berhasil membuat tiket pertanyaan.', 'success');

        return redirect()
            ->route('dashboard.ticket-list');
    }
}
