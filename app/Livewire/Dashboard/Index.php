<?php

namespace App\Livewire\Dashboard;

use App\Models\Ticket;
use App\Models\Tiket;
use App\Models\TiketCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // public $search = '';
    public $tiket, $categoryList;
    public $submissionCount, $researchCount, $responseCount, $finishedCount;

    public function mount(): void
    {
        $this->submissionCount = Ticket::where('user_id', Auth::user()->id)
            ->where('submission', '!=', null)
            ->count();

        $this->researchCount = Ticket::where('user_id', Auth::user()->id)
            ->where('research', '!=', null)
            ->count();

        $this->responseCount = Ticket::where('user_id', Auth::user()->id)
            ->where('response', '!=', null)
            ->count();

        $this->finishedCount = Ticket::where('user_id', Auth::user()->id)
            ->where('finished', '!=', null)
            ->count();
    }

    public function render()
    {
        return view('livewire.dashboard.index', [
            'ticket' => Ticket::with(['user', 'category'])
                ->where('user_id', Auth::user()->id)
                // ->where('title', 'like', '%' . $this->search . '%')
                ->paginate(3),
        ]);
    }
}
