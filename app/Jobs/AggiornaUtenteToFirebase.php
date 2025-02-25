<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AggiornaUtenteToFirebase implements ShouldQueue
{
    use Queueable;

    public $user_id;
    public $admin;

    public function __construct($user_id, $admin = false)
    {
        $this->user_id = $user_id;
        $this->admin = $admin;
    }

    public function handle(): void
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        if ($user = User::find($this->user_id)) {
            $database->collection('users')
                ->document($user->firebase_uid)
                ->update([
                    ['path' => 'isAdmin', 'value' => $this->admin],
                ]);
        }
    }
}
