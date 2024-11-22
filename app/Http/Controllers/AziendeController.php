<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AziendeController extends Controller
{
    public function aziende()
    {
        return view('content.aziende.aziende');
    }
}
