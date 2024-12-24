<?php

namespace App\Livewire;

use App\Jobs\EliminaUtenteFromFirebase;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EliminaUtente extends ModalComponent
{
    public $user_id;

    public function delete()
    {
        $user = User::find($this->user_id);
        $firebase_uid = $user->firebase_uid;

        $user->delete();

        $this->dispatch('refreshDatatable');

        EliminaUtenteFromFirebase::dispatch($firebase_uid);

        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-utente');
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
