<?php

namespace Database\Seeders;

use App\Models\Riwayat;
use Illuminate\Database\Seeder;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            Riwayat::create([
                'id_user' => (($i % 5) + 1),
                'nama' => 'Barang ' . $i,
                'harga' => $i * 1000,
                'jumlah' => $i,
                'kode' => 'B' . str_pad($i, 2, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
