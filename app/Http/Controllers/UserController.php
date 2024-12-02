<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function utenti()
    {
        return view('content.users.utenti');
    }

    public function utente($id)
    {
        $user = User::find($id);
        return view('content.users.utente', ['user' => $user, 'id' => $id]);
    }

    public function ruoli()
    {
        return view('content.users.ruoli');
    }

    public function permessi()
    {
        return view('content.users.permessi');
    }
}
