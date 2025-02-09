<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
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

    #[Computed]
    public function photo()
    {
        if ($this->user->photo) {
            if (isset(parse_url($this->user->photo)['host'])) {
                return $this->user->photo;
            }

            return Storage::url('fotoutenti/' . $this->user->photo);
        }
    }

    public function render()
    {
        return view('livewire.utente');
    }
}
