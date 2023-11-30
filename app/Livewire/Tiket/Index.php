<?php

namespace App\Livewire\Tiket;

use App\Models\TiketCategory;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.tiket.index');
    }
}
