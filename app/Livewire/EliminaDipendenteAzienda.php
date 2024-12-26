<?php

namespace App\Livewire;

use App\Models\DipendentiAzienda;
use LivewireUI\Modal\ModalComponent;

class EliminaDipendenteAzienda extends ModalComponent
{
    public $id_azienda;
    public $id_dipendente;

    public function delete()
    {
        $dipendentiAzienda = DipendentiAzienda::where('id_azienda', $this->id_azienda)
            ->where('id_dipendente', $this->id_dipendente)
            ->first();

        if ($dipendentiAzienda) {
            $dipendentiAzienda->delete();
        }

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-dipendente-azienda');
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
