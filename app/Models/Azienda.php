<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefono',
        'indirizzo',
        'citta',
        'cap',
    ];

    public function dipendenti()
    {
        return $this->belongsToMany(User::class, 'dipendenti_aziendas', 'id_azienda', 'id_dipendente')->using(DipendentiAzienda::class)->withPivot('id');
    }
}