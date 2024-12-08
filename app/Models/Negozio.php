<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negozio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefono',
        'indirizzo',
        'citta',
        'cap',
        'id_azienda',
    ];

    public function azienda()
    {
        return $this->hasOne(Azienda::class, 'id', 'id_azienda');
    }
}
