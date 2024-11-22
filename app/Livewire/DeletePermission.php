<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class DeletePermission extends ModalComponent
{
    public $permission_id;

    public function mount($permission_id)
    {
        $this->permission_id = $permission_id;
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-permission');
    }

    public function delete()
    {
        Permission::find($this->permission_id)->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }
}
