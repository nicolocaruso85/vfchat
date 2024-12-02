<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Utente extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    #[Computed]
    public function ruoli()
    {
        return $this->user->getRoleNames();
    }

    #[Computed]
    public function aziende()
    {
        return $this->user->aziende;
    }

    public function render()
    {
        return view('livewire.utente');
    }
}