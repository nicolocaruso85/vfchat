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
        if ($azienda = $this->user->aziende->first()) {
            setPermissionsTeamId($azienda->id);
        }

        return $this->user->getRoleNames();
    }

    #[Computed]
    public function aziende()
    {
        return $this->user->aziende;
    }

    #[Computed]
    public function gruppi()
    {
        return $this->user->teams;
    }

    public function render()
    {
        return view('livewire.utente');
    }
}
