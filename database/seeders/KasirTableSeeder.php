<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kasirs')->insert([
            [
                'KodeKasir' => 'KSI22151101001',
                'Nama' => 'Ani Fauza',
                'HP' => '08221511010375',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KodeKasir' => 'KSI22151101002',
                'Nama' => 'Budi Fauza',
                'HP' => '08221511010735',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
