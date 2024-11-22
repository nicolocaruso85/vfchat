<?php

namespace App\Livewire;

use App\Models\Permission;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission as ModelsPermission;

class ModificaPermission extends ModalComponent
{
    public $permission_id;
    public $name;

    public function mount($permission_id = null)
    {
        $this->permission_id = $permission_id;
        if ($this->permission_id != null) {
            $this->edit();
        }
    }

    public function render()
    {
        return view('livewire.modifica-permission');
    }

    public function edit()
    {
        $permessi = ModelsPermission::findById($this->permission_id);
        if ($permessi) {
            $this->name = $permessi->name;
        }
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $validatedData['guard_name'] = 'web';

        if ($this->permission_id == null) {
            Permission::create($validatedData);
        }
        else {
            $permission = ModelsPermission::find($this->permission_id);
            if ($permission) {
                $permission->name = $this->name;
                $permission->save();
            }
        }

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
