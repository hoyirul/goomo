<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'email' => 'superadmin@melijo.id',
                'password' => Hash::make('superadmin'),
                'role_id' => 1
            ],
            [
                'email' => 'admin@melijo.id',
                'password' => Hash::make('admin'),
                'role_id' => 2
            ],
            [
                'email' => 'customer@melijo.id',
                'password' => Hash::make('customer'),
                'role_id' => 3
            ],
            [
                'email' => 'seller@melijo.id',
                'password' => Hash::make('seller'),
                'role_id' => 4
            ],
        ];

        foreach($data as $row){
            User::create([
                'email' => $row['email'],
                'password' => $row['password'],
                'role_id' => $row['role_id'],
                'status' => 'active',
                'image' => null,
            ]);
        }
    }
}
