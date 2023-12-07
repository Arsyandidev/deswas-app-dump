<?php

namespace App\Livewire\Tiket;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketChat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $category_id, $user_id;
    public $title, $desc;

    public function rules(): array
    {
        return [
            'category_id'   => ['required'],
            'title'         => ['required'],
            'desc'          => ['required']
        ];
    }

    public function render()
    {
        $category           = TicketCategory::all();
        return view('livewire.tiket.create', [
            'category' => json_decode($category)
        ]);
    }

    public function store()
    {
        $this->validate();

        $ticket = Ticket::create([
            'category_id'   => $this->category_id,
            'title'         => $this->title,
            'desc'          => $this->desc,
            'user_id'       => Auth::user()->id
        ]);

        if ($ticket) {
            TicketChat::create([
                'ticket_id' => $ticket->id
            ]);
        }

        toast('Berhasil membuat tiket pertanyaan.', 'success');

        return redirect()
            ->route('dashboard.ticket-list');
    }
}
