<?php

namespace Database\Seeders;

use App\Models\Admin\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'p_code' => 'AG',
                'description' => 'ASIAGAMING',
                'order' => 10

            ],
            [
                'p_code' => 'GB',
                'description' => 'BBIN',
                'order' => 9

            ],
            [
                'p_code' => 'G8',
                'description' => 'GAMEPLAY',
                'order' => 8
            ],
            [
                'p_code' => 'JK',
                'description' => 'JOKER',
                'order' => 8

            ],
            [
                'p_code' => 'JD',
                'description' => 'JDB',
                'order' => 7

            ],
            [
                'p_code' => 'L4',
                'description' => 'NEW LIVE22',
                'order' => 6
            ],
            [
                'p_code' => 'K9',
                'description' => 'KING855',
                'order' => 5
            ],
            [
                'p_code' => 'PG',
                'description' => 'PGSOFT',
                'order' => 4
            ],
            [
                'p_code' => 'PR',
                'description' => 'PRAGMATIC',
                'order' => 1
            ],
            [
                'p_code' => 'RE',
                'description' => 'KING MAKER',
                'order' => 2
            ],
            [
                'p_code' => 'S3',
                'description' => 'SBO',
                'order' => 3
            ]
        ];

        Provider::insert($data);
    }
}

