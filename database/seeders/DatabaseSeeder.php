<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CashOutRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

            $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            PlayerTableSeeder::class,
            RoleUserTableSeeder::class,
            BankTableSeeder::class,
            GameTypeSeeder::class,
            ProviderSeeder::class,
            GameTypeProviderSeeder::class,
            L4GameListSeeder::class,
            AGGameListSeeder::class,
            GBGameListSeeder::class,
            PGGameListSeeder::class,
            PRGameListSeeder::class,
            REGameListSeeder::class,
            JKGameListSeeder::class,
            S3GameListSeeder::class,
            JDGameListSeeder::class

        ]);
      
    }
}
