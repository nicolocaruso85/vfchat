<?php

namespace App\Livewire;

use App\Models\Azienda;
use LivewireUI\Modal\ModalComponent;

class ModificaAzienda extends ModalComponent
{
    public $azienda_id;
    public $azienda;

    public $nome;
    public $telefono;
    public $indirizzo;
    public $citta;
    public $cap;

    public function mount()
    {
        $this->azienda = Azienda::find($this->azienda_id);

        $this->nome = $this->azienda->nome;
        $this->telefono = $this->azienda->telefono;
        $this->indirizzo = $this->azienda->indirizzo;
        $this->citta = $this->azienda->citta;
        $this->cap = $this->azienda->cap;
    }

    public function render()
    {
        return view('livewire.modifica-azienda');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'nome' => 'required',
            'telefono' => '',
            'indirizzo' => '',
            'citta' => '',
            'cap' => '',
        ]);

        $this->azienda->update($validatedData);

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
