<?php

namespace App\Models;

use App\Observers\AziendaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([AziendaObserver::class])]
class Azienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefono',
        'indirizzo',
        'citta',
        'cap',
        'firebase_uid',
        'codice_azienda',
    ];

    public function dipendenti()
    {
        return $this->belongsToMany(User::class, 'dipendenti_aziendas', 'id_azienda', 'id_dipendente')->using(DipendentiAzienda::class)->withPivot('id');
    }

    public function negozi()
    {
        return $this->hasMany(Negozio::class, 'id_azienda', 'id');
    }
}
