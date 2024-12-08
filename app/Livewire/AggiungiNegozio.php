<?php

namespace App\Livewire;

use App\Models\Negozio;
use LivewireUI\Modal\ModalComponent;

class AggiungiNegozio extends ModalComponent
{
    public $id_azienda;

    public $nome;
    public $telefono;
    public $indirizzo;
    public $citta;
    public $cap;

    public function render()
    {
        return view('livewire.aggiungi-negozio');
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

        $validatedData['id_azienda'] = $this->id_azienda;

        $azienda = Negozio::create($validatedData);

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
