<?php

namespace App\Jobs;

use App\Models\Azienda;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AggiornaAziendaToFirebase implements ShouldQueue
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

        $database->collection('aziende')
            ->document($azienda->firebase_uid)
            ->set([
                'nome' => $azienda->nome,
                'telefono' => $azienda->telefono,
                'indirizzo' => $azienda->indirizzo,
                'citta' => $azienda->citta,
                'cap' => $azienda->cap,
            ]);
    }
}
