<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class EliminaDipendenteRuolo extends ModalComponent
{
    public $id_ruolo;
    public $id_dipendente;

    public function delete()
    {
        $user = User::find($this->id_dipendente);
        $role = Role::find($this->id_ruolo);

        $user->removeRole($role->name);

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-dipendente-ruolo');
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
