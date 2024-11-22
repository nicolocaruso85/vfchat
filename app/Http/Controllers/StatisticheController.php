<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StatisticheController extends Controller
{
    public function utentiCollegati()
    {
        return view('content.statistiche.utenti-collegati');
    }

    public function punteggioUtenti()
    {
        return view('content.statistiche.punteggio-utenti');
    }

    public function punteggioPerStore()
    {
        return view('content.statistiche.punteggio-per-store');
    }

    public function reportMessaggiInviati()
    {
        return view('content.statistiche.report-messaggi-inviati');
    }

    public function reportConClassifica()
    {
        return view('content.statistiche.report-con-classifica');
    }

    public function reportGenerale()
    {
        return view('content.statistiche.report-generale');
    }
}
