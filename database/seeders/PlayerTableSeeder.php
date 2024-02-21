<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
                'name'           => 'mawi',
                'phone'          => '09222222222',
                'password'       => Hash::make('password'),
                'balance'        => 10000,
                'agent_id'      => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
        ];
        $data = User::create($users);
        $data->userWallet()->create(
            [
                'wallet' => 10000.00,
                'ag_wallet' => 0.00,
                'gb_wallet' => 0.00,
                'g8_wallet' => 0.00,
                'jk_wallet' => 0.00,
                'jd_wallet' => 0.00,
                'l4_wallet' => 0.00,
                'k9_wallet' => 0.00,
                'pg_wallet' => 0.00,
                'pr_wallet' => 0.00,
                're_wallet' => 0.00,
                's3_wallet' => 0.00
            ]
        );
    }
}
