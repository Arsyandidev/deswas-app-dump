<?php

namespace App\Livewire\DashboardAuditor;

use App\Models\TransaksiTiket;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public array $value;
    public array $rendah;

    public function mount()
    {
        $this->value[] = DB::table('transaksi_tiket')
            ->selectRaw('count(id)')
            ->groupBy('resiko')
            ->get();
        // dd($this->value[0]);
    }

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.dashboard-auditor.index');
    }
}
