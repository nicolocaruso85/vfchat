<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Azienda;

class AziendeController extends Controller
{
    public function aziende()
    {
        return view('content.aziende.aziende');
    }

    public function azienda($id)
    {
        $azienda = Azienda::find($id);
        return view('content.aziende.azienda', ['azienda' => $azienda, 'id' => $id]);
    }
}
