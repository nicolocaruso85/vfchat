<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EliminaDipendenteGruppo extends ModalComponent
{
    public $id_gruppo;
    public $id_dipendente;

    public function delete()
    {
        $user = User::find($this->id_dipendente);
        $user->detachTeam($this->id_gruppo);

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-dipendente-gruppo');
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
