<?php

namespace App\Livewire;

use App\Models\DipendentiNegozio;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EliminaDipendenteNegozio extends ModalComponent
{
    public $id_negozio;
    public $id_dipendente;

    public function delete()
    {
        DipendentiNegozio::where('id_dipendente', $this->id_dipendente)
            ->where('id_negozio', $this->id_negozio)
            ->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-dipendente-negozio');
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
