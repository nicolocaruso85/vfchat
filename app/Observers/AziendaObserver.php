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
        $ruoli = ['Presidente', 'Ufficio legale', 'Consulente fiscale', 'Vice presidente business', 'Vice presidente finanza e amministrazione', 'Progettazione e sviluppo prodotti', 'Gestione e acquisto prodotti', 'Gestione magazzino', 'Gestione canali di distribuzione', 'Marketing e comunicazione aziendale', 'Gestione fornitori e logistica', 'Risorse umane', 'Servizi finanziari', 'Manager IT', 'Amministrazione', 'Rivenditore', 'Vendita all\'ingrosso', 'E-commerce'];

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
