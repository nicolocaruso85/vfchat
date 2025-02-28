<?php

namespace App\Jobs;

use App\Mail\NotificaAssegnazioneRuolo;
use App\Mail\NuovoUtenteDaApprovare;
use App\Models\Azienda;
use App\Models\DipendentiAzienda;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

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
                        'name' => $data['name'],
                    ]);
                }
                if (isset($data['isApproved'])) {
                    $user->update([
                        'active' => true,
                    ]);
                }
                if (isset($data['ruoli'])) {
                    if ($azienda = $user->aziende->first()) {
                        setPermissionsTeamId($azienda->id);

                        $ruoli = [];

                        foreach ($data['ruoli'] as $ruolo) {
                            $ruoli[] = $ruolo['id'];
                        }

                        $user->syncRoles($ruoli);

                        Mail::to($user->email)
                            ->queue(new NotificaAssegnazioneRuolo($user));
                    }
                }
                if (isset($data['gruppi'])) {
                    foreach ($data['gruppi'] as $gruppo) {
                        $user->attachTeam($gruppo['id']);
                    }
                }
            }
            else if (isset($data['name']) && isset($data['email'])) {
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => 'fake-password',
                    'active' => (isset($data['isApproved']) && $data['isApproved']) ? true : false,
                    'firebase_uid' => $firebase_uid,
                ]);

                if (!empty($data['codiceAzienda'])) {
                    $azienda = Azienda::where('codice_azienda', $data['codiceAzienda'])->first();
                    if ($azienda) {
                        DipendentiAzienda::create([
                            'id_dipendente' => $user->id,
                            'id_azienda' => $azienda->id,
                        ]);

                        if (!$user->active) {
                            foreach ($azienda->amministratori as $amministratore) {
                                Mail::to($amministratore->email)
                                    ->queue(new NuovoUtenteDaApprovare($user));
                            }
                        }
                    }
                }
            }

            $database->collection('users-updates')
                ->document($firebase_uid)
                ->delete();
        }
    }
}
