<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lowongan extends Model
{
    use SoftDeletes;

    // Nama tabel di database
    protected $table = 'pelamar';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'alamat_domisili',
        'lowongan_id',
        'is_verified'
    ];

    // Konversi tipe data
    protected function casts(): array
    {
        return [
            'is_verified' => 'boolean',
            'lowongan_id' => 'integer'
        ];
    }
}
