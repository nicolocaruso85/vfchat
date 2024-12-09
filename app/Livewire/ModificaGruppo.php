<?php

namespace App\Livewire;

use App\Models\Gruppo;
use LivewireUI\Modal\ModalComponent;

class ModificaGruppo extends ModalComponent
{
    public $gruppo_id;
    public $gruppo;

    public $name;

    public function mount()
    {
        $this->gruppo = Gruppo::find($this->gruppo_id);

        $this->name = $this->gruppo->name;
    }

    public function render()
    {
        return view('livewire.modifica-gruppo');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->gruppo->update($validatedData);

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
