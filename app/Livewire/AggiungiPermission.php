<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class AggiungiPermission extends ModalComponent
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.aggiungi-permission');
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => '',
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
