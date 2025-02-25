<?php

namespace App\Livewire;

use App\Models\Azienda;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class ApprovaDipendenteAzienda extends ModalComponent
{
    public $id_dipendente;
    public $id_azienda;

    public $user;
    public $azienda;

    public function mount()
    {
        $this->user = User::find($this->id_dipendente);
        $this->azienda = Azienda::find($this->id_azienda);
    }

    public function render()
    {
        return view('livewire.approva-dipendente-azienda');
    }

    public function approve()
    {
        $this->user->update([
            'active' => true,
        ]);

        $this->dispatch('refreshDatatable');

        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }
}
