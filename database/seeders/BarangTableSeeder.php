<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            [
                'KodeBarang' => 'BRG22151101001',
                'NamaBarang' => 'Indomie Rasa Fauza',
                'Satuan' => 'Bungkus',
                'HargaSatuan' => 3000.00,
                'Stok' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KodeBarang' => 'BRG22151101002',
                'NamaBarang' => 'Susu Ultra Fauza',
                'Satuan' => 'Pcs',
                'HargaSatuan' => 5000.00,
                'Stok' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data barang lainnya sesuai kebutuhan
        ]);
    }
}
