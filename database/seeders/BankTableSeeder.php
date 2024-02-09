<?php

namespace Database\Seeders;

use App\Models\Admin\Bank;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bank = [
            [
                'name' =>  'CB Bank',
                'digit' => 13,
            ],
            [
                'name' => 'AYA Bank',
                'digit' => 16,
            ],
            [
                'name' => 'KBZ Bank',
                'digit' => 17,
            ],
            [
                'name' => 'KBZ Pay',
                'digit' => 11,
            ],
            [
                'name' => 'Yoma Bank',
                'digit' => 16,
            ]
            ];
       
        Bank::insert($bank);
 
    }
}
