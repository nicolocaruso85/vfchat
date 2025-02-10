<?php

namespace App\Jobs;

use App\Models\Azienda;
use App\Models\Gruppo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Permission\Models\Role;

class InviaAziendaToFirebase implements ShouldQueue
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

        $ruoli = [];
        foreach (Role::where('team_id', $this->id_azienda)->get() as $ruolo) {
            $ruoli[] = [
                'id' => $ruolo->id,
                'nome' => $ruolo->name,
            ];
        }

        $gruppi = [];
        foreach (Gruppo::where('owner_id', $this->id_azienda)->get() as $gruppo) {
            $gruppi[] = [
                'id' => $gruppo->id,
                'nome' => $gruppo->name,
            ];
        }

        $createdAzienda = $database->collection('aziende')
            ->add([
                'nome' => $azienda->nome,
                'telefono' => $azienda->telefono,
                'indirizzo' => $azienda->indirizzo,
                'citta' => $azienda->citta,
                'cap' => $azienda->cap,
                'ruoli' => $ruoli,
                'gruppi' => $gruppi,
            ]);

        $azienda->update(['firebase_uid' => $createdAzienda->id()]);
    }
}
