<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ModificaRuolo extends ModalComponent
{
    public $role_id;
    public $role;

    public $name;
    public $sel_permission;

    public $permissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();

        $this->role = Role::find($this->role_id);

        $this->name = $this->role->name;

        $this->sel_permission = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $this->role_id)
            ->get()
            ->pluck('id');
    }

    public function render()
    {
        return view('livewire.modifica-ruolo');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->role->update([
            'name' => $validatedData['name'],
        ]);
        $this->role->syncPermissions($this->sel_permission);

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
