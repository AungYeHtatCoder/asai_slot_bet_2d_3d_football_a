<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'           => 'Owner',
                'phone'          => '09123456789',
                'password'       => Hash::make('password'),
                'balance'        => 1000000,
                'agent_id'      => null,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Agent',
                'phone'          => '09112345678',
                'password'       => Hash::make('password'),
                'balance'        => 10000,
                'agent_id'      => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ]
            ];

        User::insert($users);
    }
}