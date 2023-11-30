<?php

namespace App\Livewire\Tiket;

use App\Models\Ticket;
use App\Models\TicketCategory;
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

    public function mount(): void
    {
        $category           = TicketCategory::all();
        $this->category_id  = json_decode($category);
    }

    public function render()
    {
        return view('livewire.tiket.create');
    }

    public function store()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            Ticket::create([
                'category_id'   => $this->category_id,
                'title'         => $this->title,
                'desc'          => $this->desc,
                'user_id'       => Auth::user()->id
            ]);

            DB::commit();

            toast('Berhasil membuat tiket pertanyaan.', 'success');

            return redirect()
                ->route('dashboard.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            toast($th->getMessage(), 'error');

            return redirect()
                ->back()
                ->withInput();
        }
    }
}
