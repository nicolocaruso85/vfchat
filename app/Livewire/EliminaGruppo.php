<?php

namespace App\Livewire;

use App\Models\Gruppo;
use LivewireUI\Modal\ModalComponent;

class EliminaGruppo extends ModalComponent
{
    public $gruppo_id;

    public function delete()
    {
        Gruppo::find($this->gruppo_id)->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-gruppo');
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
