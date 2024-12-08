<?php

namespace App\Livewire;

use App\Models\Negozio;
use LivewireUI\Modal\ModalComponent;

class EliminaNegozio extends ModalComponent
{
    public $negozio_id;

    public function delete()
    {
        Negozio::find($this->negozio_id)->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-negozio');
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
