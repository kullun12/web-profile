<?php

namespace App\Services;

use App\Models\Pelamar;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PelamarService
{
    /**
     * Logika untuk menyimpan data baru (Create)
     */
    public function store(array $data)
    {
        // Memulai transaksi database (Mencegah data tersimpan setengah jika ada error)
        DB::beginTransaction();
        
        try {
            // Proses manipulasi data sebelum masuk database bisa diletakkan di sini
            // Contoh: Mengonversi nilai is_verified dari checkbox
            $data['is_verified'] = isset($data['is_verified']) ? (bool) $data['is_verified'] : false;

            // Simpan data
            $pelamar = Pelamar::create($data);

            DB::commit();
            return $pelamar;
            
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Gagal menyimpan pelamar baru: ' . $e->getMessage());
            throw $e; // Lempar error kembali ke Controller
        }
    }

    /**
     * Logika untuk memperbarui data (Update)
     */
    public function update(Pelamar $pelamar, array $data)
    {
        DB::beginTransaction();
        
        try {
            $data['is_verified'] = isset($data['is_verified']) ? (bool) $data['is_verified'] : false;

            // Update data yang spesifik
            $pelamar->update($data);

            DB::commit();
            return $pelamar;
            
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Gagal memperbarui pelamar ID ' . $pelamar->id . ': ' . $e->getMessage());
            throw $e;
        }
    }
}
