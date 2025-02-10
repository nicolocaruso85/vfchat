<?php

namespace App\Jobs;

use App\Models\Azienda;
use App\Models\Gruppo;
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

        $gruppi = [];
        foreach (Gruppo::where('owner_id', $this->id_azienda)->get() as $gruppo) {
            $gruppi[] = [
                'id' => $gruppo->id,
                'nome' => $gruppo->name,
            ];
        }

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
                'gruppi' => $gruppi,
            ]);
    }
}
