<?php

namespace Database\Seeders;

use App\Models\UserOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 4,
                'name' => 'Owner Test',
                'phone' => '12345678'
            ]
        ];

        foreach($data as $row){
            UserOwner::create([
                'user_id' => $row['user_id'],
                'name' => $row['name'],
                'phone' => $row['phone'],
                'identity_photo' => null, 
                'driver_license' => null, 
                'selfie_photo' => null
            ]);
        }
    }
}
