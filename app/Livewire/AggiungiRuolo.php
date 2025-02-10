<?php

namespace App\Livewire;

use App\Models\Azienda;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AggiungiRuolo extends ModalComponent
{
    public $permissions = [];

    public $name;
    public $sel_permission;
    public $id_azienda;

    public $aziende = [];

    public function mount()
    {
        $this->permissions = [];
        foreach (Permission::all() as $permission) {
            $this->permissions[$permission->name] = $permission->name;
        }

        $this->aziende = Azienda::all()->pluck('nome', 'id')->toArray();
    }

    #[On('changeSelPermissions')]
    public function changeSelPermissions($data)
    {
        $this->sel_permission = $data['data'];
    }

    #[On('changeAzienda')]
    public function changeAzienda($data)
    {
        $this->id_azienda = $data['data'];
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

        if ($this->id_azienda) {
            $validatedData['team_id'] = $this->id_azienda;
        }

        $role = Role::create($validatedData);
        $role->syncPermissions($this->sel_permission);

        if ($this->id_azienda) {
            Permission::create(['name' => 'ruolo.' . $role->id . '.messaggi']);
            Permission::create(['name' => 'ruolo.' . $role->id . '.immagini']);
            Permission::create(['name' => 'ruolo.' . $role->id . '.file']);
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
