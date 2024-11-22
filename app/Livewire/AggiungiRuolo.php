<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AggiungiRuolo extends ModalComponent
{
    public $permissions = [];

    public $name;
    public $sel_permission;

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function render()
    {
        return view('livewire.aggiungi-ruolo');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);
        $validatedData['guard_name'] = 'web';

        $role = Role::create($validatedData);
        $role->syncPermissions($this->sel_permission);

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
