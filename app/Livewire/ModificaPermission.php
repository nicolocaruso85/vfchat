<?php

namespace App\Livewire;

use App\Models\Permission;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission as ModelsPermission;

class ModificaPermission extends ModalComponent
{
    public $permission_id;

    public $name;
    public $description;

    public function mount()
    {
        $permission = ModelsPermission::findById($this->permission_id);
        $this->name = $permission->name;
    }

    public function render()
    {
        return view('livewire.modifica-permission');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => '',
        ]);

        $permission = ModelsPermission::find($this->permission_id);
        $permission->update($validatedData);

        $this->dispatch('refreshDatatable');

        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
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
