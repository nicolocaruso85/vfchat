<?php

namespace App\Livewire;

use App\Models\Azienda;
use LivewireUI\Modal\ModalComponent;

class AggiungiDipendenteGruppo extends ModalComponent
{
    public $id_azienda;
    public $id_gruppo;

    public function render()
    {
        return view('livewire.aggiungi-dipendente-gruppo');
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
