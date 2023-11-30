<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Login extends Component
{

    public $email;
    public $password;

    public function submit()
    {
        $this->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            toast('Anda telah login.', 'success');
            return redirect()->route('dashboard.index');
        } else {
            toast('Email atau Password salah!', 'error');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
