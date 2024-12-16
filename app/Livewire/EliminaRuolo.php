<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EliminaRuolo extends ModalComponent
{
    public $role_id;

    public function mount($role_id)
    {
        $this->role_id = $role_id;
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.elimina-ruolo');
    }

    public function delete()
    {
        Role::find($this->role_id)->delete();

        Permission::where('name', 'ruolo.' . $this->role_id . '.messaggi')->delete();
        Permission::where('name', 'ruolo.' . $this->role_id . '.immagini')->delete();
        Permission::where('name', 'ruolo.' . $this->role_id . '.file')->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }
}
