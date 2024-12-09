<?php

namespace App\Livewire;

use App\Models\Gruppo;
use LivewireUI\Modal\ModalComponent;

class AggiungiGruppo extends ModalComponent
{
    public $id_azienda;

    public $name;

    public function render()
    {
        return view('livewire.aggiungi-gruppo');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $validatedData['owner_id'] = $this->id_azienda;

        Gruppo::create($validatedData);

        $this->dispatch('refreshDatatable');

        $this->closeModal();
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
