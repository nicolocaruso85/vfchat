<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class ModificaPermission extends ModalComponent
{
    public $permission_id;

    public $name;
    public $description;

    public function mount()
    {
        $permission = Permission::findById($this->permission_id);
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

        $permission = Permission::find($this->permission_id);
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
