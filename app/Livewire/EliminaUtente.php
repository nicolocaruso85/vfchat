<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EliminaUtente extends ModalComponent
{
    public $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }


    public function delete()
    {
        User::find($this->user_id)->delete();

        $this->dispatch('refreshDatatable');
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
