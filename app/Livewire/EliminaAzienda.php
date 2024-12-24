<?php

namespace App\Livewire;

use App\Jobs\EliminaAziendaFromFirebase;
use App\Models\Azienda;
use LivewireUI\Modal\ModalComponent;

class EliminaAzienda extends ModalComponent
{
    public $azienda_id;

    public function delete()
    {
        $azienda = Azienda::find($this->azienda_id);
        $firebase_uid = $azienda->firebase_uid;

        $azienda->delete();

        $this->dispatch('refreshDatatable');

        EliminaAziendaFromFirebase::dispatch($firebase_uid);

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
