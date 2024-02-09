<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
              
                'title'      => 'Owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            
                'title'      => 'Agent',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                
                'title'      => 'Player',
                'created_at' => now(),
                'updated_at' => now(),
            ]
 
            
        ];

        Role::insert($roles);
    }
}