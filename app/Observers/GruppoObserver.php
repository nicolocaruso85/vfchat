<?php

namespace App\Observers;

use App\Models\Gruppo;
use Spatie\Permission\Models\Permission;

class GruppoObserver
{
    public function created(Gruppo $gruppo): void
    {
        Permission::updateOrCreate([
            'name' => 'gruppo.' . $gruppo->id . '.messaggi',
        ]);
        Permission::updateOrCreate([
            'name' => 'gruppo.' . $gruppo->id . '.immagini',
        ]);
        Permission::updateOrCreate([
            'name' => 'gruppo.' . $gruppo->id . '.file',
        ]);
    }

    public function deleted(Gruppo $gruppo): void
    {
        Permission::where('name', 'gruppo.' . $gruppo->id . '.messaggi')->delete();
        Permission::where('name', 'gruppo.' . $gruppo->id . '.immagini')->delete();
        Permission::where('name', 'gruppo.' . $gruppo->id . '.file')->delete();
    }
}
