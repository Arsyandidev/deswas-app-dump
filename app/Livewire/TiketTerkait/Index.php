<?php

namespace App\Livewire\TiketTerkait;

use App\Models\ParameterKategori;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketChat;
use App\Models\TransaksiTiketFile;
use App\Models\TransaksiTiketStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $kategori, $user_id;
    public $judul, $deskripsi, $gambar, $terkait;
    public $chatPerson;

    private function resetInput()
    {
        $this->judul = null;
        $this->deskripsi = null;
        $this->gambar = null;
    }

    public function mount($id)
    {
        $tiket = TransaksiTiket::with(['user', 'getKategori'])
            ->where('id', $id)
            ->get();
        $this->terkait = json_decode($tiket);

        $getChats = TransaksiTiketChat::with('tiket')
            ->where('id_transaksi_tiket', $id)
            ->get();
        $this->chatPerson = $getChats;
    }

    public function render()
    {
        $category           = ParameterKategori::all();
        return view('livewire.tiket-terkait.index', [
            'category'      => json_decode($category),
            'terkait'       => $this->terkait,
            'chat'          => $this->chatPerson
        ]);
    }

    public function store($id)
    {
        $this->validate([
            'kategori'      => 'required',
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'nullable|sometimes'
        ]);

        // Ambil semua data dari request
        $data = $this->except('_token');

        // Jika ada gambar yang diunggah, proses dan simpan di sini
        if (isset($data['gambar'])) {
            $filename = $this->gambar ? $this->gambar->getClientOriginalName() : null;
            TransaksiTiketFile::create([
                'id_transaksi_tiket'    => 5,
                'path'                  => $this->gambar ? $this->gambar->storeAs('path', $filename, 'public') : null,
                'type'                  => $this->gambar->getMimeType()
            ]);
        }

        // Buat transaksi dengan data yang sudah divalidasi
        TransaksiTiket::create($data);

        $this->redirectRoute('dashboard.detail', [
            'id'    => $id // Pastikan $id telah didefinisikan sebelumnya
        ]);
    }
}
