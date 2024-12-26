<?php

namespace App\Jobs;

use App\Models\Azienda;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class InviaDipendentiAziendaToFirebase implements ShouldQueue
{
    use Queueable;

    public $id_azienda;

    public function __construct($id_azienda)
    {
        $this->id_azienda = $id_azienda;
    }

    public function handle(): void
    {
        $azienda = Azienda::find($this->id_azienda);

        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $dipendenti = [];
        foreach ($azienda->dipendenti as $dipendente) {
            $dipendenti[] = $database->document('users/' . $dipendente->firebase_uid);
        }

        $database->collection('aziende')
            ->document($azienda->firebase_uid)
            ->update([
                ['path' => 'dipendenti', 'value' => $dipendenti],
            ]);
    }
}
