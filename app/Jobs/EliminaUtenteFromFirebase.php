<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class EliminaUtenteFromFirebase implements ShouldQueue
{
    use Queueable;

    public $firebase_uid;

    public function __construct($firebase_uid)
    {
        $this->firebase_uid = $firebase_uid;
    }

    public function handle(): void
    {
        $auth = app('firebase.auth');

        $auth->deleteUser($this->firebase_uid);
    }
}
