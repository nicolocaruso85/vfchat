<?php

namespace App\Models;

use App\Observers\NegozioObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([NegozioObserver::class])]
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
