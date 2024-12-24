<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class EliminaAziendaFromFirebase implements ShouldQueue
{
    use Queueable;

    public $firebase_uid;

    public function __construct($firebase_uid)
    {
        $this->firebase_uid = $firebase_uid;
    }

    public function handle(): void
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $database->collection('aziende')
            ->document($this->firebase_uid)
            ->delete();
    }
}
