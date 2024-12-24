<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class InviaUtenteToFirebase implements ShouldQueue
{
    use Queueable;

    public $user_id;
    public $password;

    public function __construct($user_id, $password)
    {
        $this->user_id = $user_id;
        $this->password = $password;
    }

    public function handle(): void
    {
        $user = User::find($this->user_id);

        $auth = app('firebase.auth');

        $createdUser = $auth->createUser([
            'email' => $user->email,
            'password' => $this->password,
            'displayName' => $user->name,
        ]);

        $user->update([
            'firebase_uid' => $createdUser->uid,
        ]);
    }
}
