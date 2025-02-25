<?php

namespace App\Livewire;

use App\Models\Azienda as AziendaModel;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Azienda extends Component
{
    public $azienda;

    public $activeTab = 1;

    public function mount($id)
    {
        $this->azienda = AziendaModel::find($id);
    }

    #[Computed]
    public function dipendenti()
    {
        return $this->azienda->dipendenti->count();
    }

    #[Computed]
    public function amministratori()
    {
        return $this->azienda->amministratori()->pluck('name')->toArray();
    }

    #[Computed]
    public function puntivendita()
    {
        return $this->azienda->negozi->count();
    }

    public function render()
    {
        return view('livewire.azienda');
    }
}
