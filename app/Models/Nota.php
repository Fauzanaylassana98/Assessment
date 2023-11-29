<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';
    protected $primaryKey = 'KodeNota';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'KodeNota',
        'KodeTenan',
        'KodeKasir',
        'TglNota',
        'JamNota',
        'JumlahBelanja',
        'Diskon',
        'Total',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'KodeKasir', 'KodeKasir');
    }

    public function tenan()
    {
        return $this->belongsTo(Tenan::class, 'KodeTenan', 'KodeTenan');
    }
}
