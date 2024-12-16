<?php

namespace App\Observers;

use App\Models\Azienda;
use App\Models\Gruppo;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AziendaObserver
{
    public function created(Azienda $azienda): void
    {
        $ruoli = ['Direttore Generale', 'Direttore commerciale', 'Consulente d\'area', 'Consulente di zona', 'Punto vendita', 'Dipendente'];

        foreach ($ruoli as $ruolo) {
            $role = Role::create([
                'name' => $ruolo,
                'team_id' => $azienda->id,
            ]);

            Permission::create(['name' => 'ruolo.' . $role->id . '.messaggi']);
            Permission::create(['name' => 'ruolo.' . $role->id . '.immagini']);
            Permission::create(['name' => 'ruolo.' . $role->id . '.file']);
        }
    }

    public function deleted(Azienda $azienda): void
    {
        Role::where('team_id', $azienda->id)->delete();

        Gruppo::where('owner_id', $azienda->id)->delete();
    }
}
