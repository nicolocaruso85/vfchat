<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class OrganigrammaController extends Controller
{
    public function organigramma()
    {
        return view('content.organigramma.organigramma');
    }
}
