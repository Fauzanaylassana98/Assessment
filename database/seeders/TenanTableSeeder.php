<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenans')->insert([
            [
                'KodeTenan' => 'TK22151101001',
                'NamaTenan' => 'Fauzamaret',
                'HP' => '08221511010375',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KodeTenan' => 'TK22151101002',
                'NamaTenan' => 'Fauzamart',
                'HP' => '08221511010735',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
