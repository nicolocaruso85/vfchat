<?php

namespace App\Livewire;

use App\Models\Role;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class DeleteRole extends ModalComponent
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
        return view('livewire.delete-role');
    }

    public function delete()
    {
        Role::find($this->role_id)->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }
}
