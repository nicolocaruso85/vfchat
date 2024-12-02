<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DipendentiAzienda extends Pivot
{
    use HasFactory;

    protected $table = 'dipendenti_aziendas';

    protected $fillable = [
        'id_dipendente',
        'id_azienda',
    ];

    public $timestamps = false;

    public function dipendente()
    {
        return $this->hasOne(Dipendente::class, 'id', 'id_dipendente');
    }

    public function azienda()
    {
        return $this->hasOne(Azienda::class, 'id', 'id_azienda');
    }
}
