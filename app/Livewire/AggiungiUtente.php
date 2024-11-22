<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class AggiungiUtente extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $ruoli;

    public $roles = [];

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function create()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $validatedData['password'] = Hash::make($this->password);

        $user = User::create($validatedData);

        $user->syncRoles(array_map('intval', $this->ruoli));

        $this->dispatch('refreshDatatable');

        $this->closeModal();
    }

    public function cancel()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.aggiungi-utente');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
