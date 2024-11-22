<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function utenti()
    {
        return view('content.users.utenti');
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
