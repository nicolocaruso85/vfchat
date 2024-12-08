<?php

namespace App\Livewire;

use App\Models\Azienda;
use App\Models\Gruppo;
use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Organigramma extends Component
{
    public $aziende;
    public $ruoli;

    public $id_azienda;

    public function mount()
    {
        $this->aziende = Azienda::select('id', 'nome')->get()->toArray();
        $this->ruoli = Role::all();
    }

    public function usersPerRuolo($id_ruolo)
    {
        return User::whereHas('aziende', function ($query) {
            return $query->where('id_azienda', $this->id_azienda);
        })
        ->whereHas('roles', function ($query) use ($id_ruolo) {
            return $query->where('role_id', $id_ruolo);
        })
        ->count();
    }

    public function usersPerGruppo($id_gruppo)
    {
        return User::whereHas('aziende', function ($query) {
            return $query->where('id_azienda', $this->id_azienda);
        })
        ->whereHas('teams', function ($query) use ($id_gruppo) {
            return $query->where('team_id', $id_gruppo);
        })
        ->count();
    }

    #[Computed]
    public function gruppi()
    {
        return Gruppo::where('owner_id', $this->id_azienda)->get();
    }

    public function render()
    {
        return view('livewire.organigramma');
    }
}
