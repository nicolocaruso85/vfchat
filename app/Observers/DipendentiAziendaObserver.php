<?php

namespace App\Observers;

use App\Jobs\InviaDipendentiAziendaToFirebase;
use App\Models\DipendentiAzienda;

class DipendentiAziendaObserver
{
    public function created(DipendentiAzienda $dipendentiAzienda): void
    {
        InviaDipendentiAziendaToFirebase::dispatch($dipendentiAzienda->azienda->id);
    }

    public function deleted(DipendentiAzienda $dipendentiAzienda): void
    {
        InviaDipendentiAziendaToFirebase::dispatch($dipendentiAzienda->azienda->id);
    }
}
