<?php

namespace App\Livewire;

use App\Models\Azienda;
use App\Models\Role;
use App\Models\User;
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

    public function render()
    {
        return view('livewire.organigramma');
    }
}
