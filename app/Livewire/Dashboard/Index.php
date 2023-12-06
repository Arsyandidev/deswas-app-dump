<?php

namespace App\Livewire\Dashboard;

use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $tiket, $categoryList, $getCategory, $role;
    public $submissionCount, $researchCount, $responseCount, $finishedCount, $isFinished;

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

        $categoriTicket = Ticket::select('category_id')->get();
        $this->getCategory = json_decode($categoriTicket);
    }

    public function render()
    {
        return view('livewire.dashboard.index', [
            'ticket' => Ticket::with(['user', 'category'])
                ->where('user_id', Auth::user()->id)
                ->paginate(3),
            'user' => Role::where('id', Auth::user()->role_id)
                ->first()
        ]);
    }
}
