<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class EliminaPermesso extends ModalComponent
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
        return view('livewire.elimina-permesso');
    }

    public function delete()
    {
        Permission::find($this->permission_id)->delete();

        $this->dispatch('refreshDatatable');
        $this->closeModal();
    }
}
