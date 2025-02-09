<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class AggiornaUtentiFromFirebase implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        $firestore = app('firebase.firestore');
        $database = $firestore->database();

        $user_updates = $database->collection('users-updates')
            ->documents();

        foreach ($user_updates as $user_update) {
            $firebase_uid = $user_update->id();
            $data = $user_update->data();

            $user = User::where('firebase_uid', $firebase_uid)->first();

            if ($user) {
                if (isset($data['profilePic'])) {
                    $user->update([
                        'photo' => $data['profilePic'],
                    ]);
                }
                if (isset($data['email'])) {
                    $user->update([
                        'email' => $data['email'],
                    ]);
                }
                if (isset($data['name'])) {
                    $user->update([
                        'photo' => $data['name'],
                    ]);
                }
            }
            else if (isset($data['name']) && isset($data['email'])) {
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => 'fake-password',
                ]);
            }

            $database->collection('users-updates')
                ->document($firebase_uid)
                ->delete();
        }
    }
}
