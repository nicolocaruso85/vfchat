<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DipendentiNegozio extends Pivot
{
    use HasFactory;

    protected $table = 'dipendenti_negozios';

    protected $fillable = [
        'id_dipendente',
        'id_negozio',
        'admin',
    ];

    public $timestamps = false;

    public function dipendente()
    {
        return $this->hasOne(Dipendente::class, 'id', 'id_dipendente');
    }

    public function negozio()
    {
        return $this->hasOne(Negozio::class, 'id', 'id_negozio');
    }
}
