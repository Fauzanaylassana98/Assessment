<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasirs';

    protected $fillable = [
        'KodeKasir',
        'Nama',
        'HP',
    ];

    protected $primaryKey = 'KodeKasir'; // Menggunakan 'KodeKasir' sebagai primary key

    public $incrementing = false; // Non-incrementing primary key

    protected $keyType = 'string'; // Tipe data primary key

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
