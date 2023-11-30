<?php

namespace App\Livewire\Front;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public function tes()
    {
        if (!Auth::user()) {
            Alert::warning('Ditolak!', 'Login terlebih dahulu sebelum membuat tiket.');
            return redirect()->route('login');
        } else {
            return redirect()->route('tiket');
        }
    }

    public function render(): View
    {
        return view('livewire.front.index');
    }
}
