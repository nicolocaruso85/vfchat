<?php

namespace App\Livewire;

use App\Models\Azienda;
use LivewireUI\Modal\ModalComponent;

class EliminaAzienda extends ModalComponent
{
    public $azienda_id;

    public function delete()
    {
        Azienda::find($this->azienda_id)->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-azienda');
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
