<?php

namespace App\Livewire;

use App\Models\Negozio;
use LivewireUI\Modal\ModalComponent;

class ModificaNegozio extends ModalComponent
{
    public $negozio_id;

    public $nome;
    public $telefono;
    public $indirizzo;
    public $citta;
    public $cap;

    public function mount()
    {
        $this->negozio = Negozio::find($this->negozio_id);

        $this->nome = $this->negozio->nome;
        $this->telefono = $this->negozio->telefono;
        $this->indirizzo = $this->negozio->indirizzo;
        $this->citta = $this->negozio->citta;
        $this->cap = $this->negozio->cap;
    }

    public function render()
    {
        return view('livewire.modifica-negozio');
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

        $this->negozio->update($validatedData);

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
