<?php

namespace App\Livewire\Tiket;

use App\Models\ParameterKategori;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use App\Models\TransaksiTiketFile;
use App\Models\TransaksiTiketStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $kategori, $user_id;
    public $judul, $deskripsi, $gambar, $file;
    public $pengajuan, $telaah, $jawaban, $selesai;

    public function rules()
    {
        return [
            'kategori'      => ['required'],
            'judul'         => ['required'],
            'deskripsi'     => ['required'],
            'gambar'        => ['nullable', 'sometimes'],
            'file'          => ['nullable', 'sometimes', 'file', 'mimes:pdf,doc,docx,xlsx', 'max:5000']
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

            if ($this->gambar) {
                $pictname = $this->gambar ? $this->gambar->getClientOriginalName() : null;
                TransaksiTiketFile::create([
                    'id_transaksi_tiket'    => $ticket->id,
                    'image'                 => $this->gambar ? $this->gambar->storeAs('path', $pictname, 'public') : null,
                    'type'                  => $this->gambar ? $this->gambar->getMimeType() : null
                ]);
            }

            if ($this->file) {
                $filename = $this->file ? $this->file->getClientOriginalName() : null;
                TransaksiTiketFile::create([
                    'id_transaksi_tiket'    => $ticket->id,
                    'file'                  => $this->file ? $this->file->storeAs('path', $filename, 'public') : null,
                    'type'                  => $this->file ? $this->file->getMimeType() : null
                ]);
            }
        }

        $this->resetInput();
        toast('Berhasil membuat tiket pertanyaan.', 'success');

        return redirect()
            ->route('dashboard.ticket-list');
    }
}
