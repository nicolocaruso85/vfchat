<?php

namespace App\Livewire;

use App\Models\Permission;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission as ModelsPermission;

class AggiungiPermission extends ModalComponent
{
    public $name;

    public function render()
    {
        return view('livewire.aggiungi-permission');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $validatedData['guard_name'] = 'web';

        Permission::create($validatedData);

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
