<?php

namespace App\Observers;

use App\Models\Negozio;
use Spatie\Permission\Models\Permission;

class NegozioObserver
{
    public function created(Negozio $negozio): void
    {
        Permission::updateOrCreate([
            'name' => 'negozio.' . $negozio->id . '.messaggi',
        ]);
        Permission::updateOrCreate([
            'name' => 'negozio.' . $negozio->id . '.immagini',
        ]);
        Permission::updateOrCreate([
            'name' => 'negozio.' . $negozio->id . '.file',
        ]);
    }

    public function deleted(Negozio $negozio): void
    {
        Permission::where('name', 'negozio.' . $negozio->id . '.messaggi')->delete();
        Permission::where('name', 'negozio.' . $negozio->id . '.immagini')->delete();
        Permission::where('name', 'negozio.' . $negozio->id . '.file')->delete();
    }
}
