<?php

namespace Database\Seeders;

use App\Models\MotorcycleBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorcycleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['brand_name' => 'Honda'],
            ['brand_name' => 'Yamaha'],
            ['brand_name' => 'Kawasaki'],
            ['brand_name' => 'Suzuki'],
            ['brand_name' => 'Viar'],
            ['brand_name' => 'Kaisar Motorindo'],
        ];

        foreach($data as $row){
            MotorcycleBrand::create([
                'brand_name' => $row['brand_name']
            ]);
        }
    }
}
