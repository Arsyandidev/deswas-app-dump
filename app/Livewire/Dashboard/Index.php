<?php

namespace App\Livewire\Dashboard;

use App\Models\Role;
use App\Models\Ticket;
use App\Models\TransaksiTiket;
use App\Models\TransaksiTiketStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $tiket, $categoryList, $getCategory, $role;
    public $submissionCount, $researchCount, $responseCount, $finishedCount, $isFinished;
    public $telaah;

    public function mount(): void
    {
        // $this->telaah = TransaksiTiketStatus::
        $this->submissionCount = TransaksiTiket::where('user_id', Auth::user()->id)
            ->where('pengajuan', '!=', null)
            ->count();

        $this->researchCount = TransaksiTiket::where('user_id', Auth::user()->id)
            ->where('telaah', '!=', null)
            ->count();

        $this->responseCount = TransaksiTiket::where('user_id', Auth::user()->id)
            ->where('jawaban', '!=', null)
            ->count();

        $this->finishedCount = TransaksiTiket::where('user_id', Auth::user()->id)
            ->where('selesai', '!=', null)
            ->count();

        $categoriTicket = TransaksiTiket::select('kategori')->get();
        $this->getCategory = json_decode($categoriTicket);
    }

    public function render()
    {
        return view('livewire.dashboard.index', [
            'ticket' => TransaksiTiket::with(['user', 'getKategori'])
                ->where('user_id', Auth::user()->id)
                ->where('selesai', '!=', null)
                ->paginate(3),
            'user' => Role::where('id', Auth::user()->role_id)
                ->first()
        ]);
    }
}
