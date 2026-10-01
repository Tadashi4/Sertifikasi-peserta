<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    // Tentukan nama tabel secara spesifik
    protected $table = 'skema';

    // Kolom yang dapat diisi secara massal
    protected $guarded = ['id'];

    // Relasi One-to-Many: Satu skema memiliki banyak peserta
    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id_skema');
    }
}