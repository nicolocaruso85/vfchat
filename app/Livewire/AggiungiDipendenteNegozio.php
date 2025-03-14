<?php

namespace App\Livewire;

use App\Models\Azienda;
use LivewireUI\Modal\ModalComponent;

class AggiungiDipendenteNegozio extends ModalComponent
{
    public $id_azienda;
    public $id_negozio;

    public function render()
    {
        return view('livewire.aggiungi-dipendente-negozio');
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
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
