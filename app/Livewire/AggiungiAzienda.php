<?php

namespace App\Livewire;

use App\Models\Azienda;
use LivewireUI\Modal\ModalComponent;

class AggiungiAzienda extends ModalComponent
{
    public $nome;
    public $telefono;
    public $indirizzo;
    public $citta;
    public $cap;

    public function render()
    {
        return view('livewire.aggiungi-azienda');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'nome' => 'required',
            'telefono' => '',
            'indirizzo' => '',
            'citta' => '',
            'cap' => '',
        ]);

        Azienda::create($validatedData);

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
