<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\User;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function checkPermission($sender, $receiver, $team, $action)
    {
        if ($action != 'messaggi' && $action != 'immagini' && $action != 'file') {
            return 0;
        }

        $sender_user = User::where('firebase_uid', $sender)->first();
        $receiver_user = User::where('firebase_uid', $receiver)->first();
        $azienda = Azienda::where('firebase_uid', $team)->first();

        if ($sender_user && $receiver_user && $azienda) {
            setPermissionsTeamId($azienda->id);

            foreach ($receiver_user->roles as $role) {
                if ($sender_user->hasPermissionTo('ruolo.' . $role->id . '.' . $action)) {
                    return 1;
                }
            }
        }

        return 0;
    }
}
