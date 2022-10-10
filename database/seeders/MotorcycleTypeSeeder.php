<?php

namespace Database\Seeders;

use App\Models\MotorcycleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MotorcycleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type_name' => 'Matic'],
            ['type_name' => 'Gear'],
            ['type_name' => 'Clutch']
        ];

        foreach($data as $row){
            MotorcycleType::create([
                'type_name' => $row['type_name']
            ]);
        }
    }
}
