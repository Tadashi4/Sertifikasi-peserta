<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    // Tentukan nama tabel secara spesifik
    protected $table = 'peserta';

    // Kolom yang dapat diisi secara massal
    protected $guarded = ['id'];

    // Relasi Inverse/BelongsTo: Peserta terhubung ke satu skema
    public function skema()
    {
        return $this->belongsTo(Skema::class, 'id_skema');
    }
}