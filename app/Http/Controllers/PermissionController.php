<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use App\Models\User;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function checkPermission($sender, $receiver, $team, $action)
    {
        if ($action != 'messaggi' && $action != 'immagini' && $action != 'file' && $action != 'gruppo') {
            return json_encode(['success' => 0]);
        }

        $azienda = Azienda::where('firebase_uid', $team)->first();

        if ($action == 'gruppo') {
            $sender_user = User::where('firebase_uid', $sender)->first();
            $receiver_users = User::whereIn('firebase_uid', explode(',', $receiver))->get();

            if ($sender_user && !empty($receiver_users) && $azienda) {
                setPermissionsTeamId($azienda->id);

                $user_ids = [];
                foreach ($receiver_users as $receiver_user) {
                    foreach ($receiver_user->roles as $role) {
                        if ($sender_user->hasPermissionTo('ruolo.' . $role->id . '.messaggi')) {
                            $user_ids[] = $receiver_user->firebase_uid;
                            break;
                        }
                    }
                }

                return json_encode(['success' => 1, 'user_ids' => $user_ids]);
            }
        }
        else {
            $sender_user = User::where('firebase_uid', $sender)->first();
            $receiver_user = User::where('firebase_uid', $receiver)->first();

            if ($sender_user && $receiver_user && $azienda) {
                setPermissionsTeamId($azienda->id);

                foreach ($receiver_user->roles as $role) {
                    if ($sender_user->hasPermissionTo('ruolo.' . $role->id . '.' . $action)) {
                        return json_encode(['success' => 1]);
                    }
                }
            }
        }

        return json_encode(['success' => 0]);
    }
}
