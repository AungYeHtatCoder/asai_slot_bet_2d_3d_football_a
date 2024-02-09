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

            ],
            [
                'p_code' => 'GB',
                'description' => 'BBIN',

            ],
            [
                'p_code' => 'G8',
                'description' => 'GAMEPLAY',
            ],
            [
                'p_code' => 'JK',
                'description' => 'JOKER',

            ],
            [
                'p_code' => 'JD',
                'description' => 'JDB',

            ],
            [
                'p_code' => 'L4',
                'description' => 'NEW LIVE22',
            ],
            [
                'p_code' => 'K9',
                'description' => 'KING855',
            ],
            [
                'p_code' => 'PG',
                'description' => 'PGSOFT',
            ],
            [
                'p_code' => 'PR',
                'description' => 'PRAGMATIC',
            ],
            [
                'p_code' => 'RE',
                'description' => 'KING MAKER',
            ],
            [
                'p_code' => 'S3',
                'description' => 'SBO',
            ]
        ];

        Provider::insert($data);
    }
}

