<?php

namespace App\Livewire\DashboardAuditor\TicketList;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $ticket;
    public $researchName;

    public function mount($id)
    {
        $ticket = Ticket::find($id);
        $this->ticket = json_decode($ticket);

        $rname = Ticket::getUserResearch();
        $this->researchName = $rname;
    }

    public function telaah($id)
    {
        Ticket::where('id', $id)
            ->update([
                'research' => Carbon::now(),
                'user_research' => Auth::user()->id
            ]);

        toast('Tiket di Telaah.', 'success');
        $this->redirectRoute('dashboard.auditor.detail', ['id' => $id]);
    }

    public function firstLayer($id)
    {
        Ticket::where('id', $id)
            ->update(['risk' => 'Rendah']);

        toast('Pertanyaan diajukan untuk Layer 1', 'success');
        $this->redirectRoute('dashboard.auditor.detail', ['id' => $id]);
    }

    public function secondLayer($id)
    {
        Ticket::where('id', $id)
            ->update(['risk' => 'Tinggi', 'layers' => 2]);

        toast('Pertanyaan diajukan untuk Layer 2', 'success');
        $this->redirectRoute('dashboard.auditor.detail', ['id' => $id]);
    }

    public function render()
    {
        return view('livewire.dashboard-auditor.ticket-list.detail', [
            'ticket' => $this->ticket,
            'user' => Ticket::with('user')
                ->first(),
            'research' => $this->researchName
        ]);
    }
}
