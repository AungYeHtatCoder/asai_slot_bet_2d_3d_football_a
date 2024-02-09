<?php

namespace Database\Seeders;

use App\Models\Admin\GameList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class S3GameListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
  {
        $data = [
                [
                    "game_id"=> "6101",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en" => "Royal Baccarat",
                    "image"=> "royalbaccarat.png",

                ],
                [
                    "game_id"=> "6102",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=> "Royal Roulette",
                    "image"=> "royalroulette.png",
                ],
                [
                    "game_id"=> "6103",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal Sic Bo",
                    "image"=> "royalsicbo.png",

                ],
                [
                    "game_id"=> "6104",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal Blackjack",
                    "image"=> "royalblackjack.png"

                ],
                [
                    "game_id"=> "6105",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal 5 Box Blackjack",
                    "image"=> "royal5boxbj.png"

                ],
                [
                    "game_id"=> "6106",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Dragon Bonus",
                    "image"=> "dragonbonus.png"

                ],
                [
                    "game_id"=> "604501",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Money Roll",
                    "image"=> "moneyroll.png"

                ],
                [
                    "game_id"=> "602801",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal Baccarat",
                    "image"=> "royalbaccarat.png"
                ],
                [
                    "game_id"=> "602802",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal Roulette",
                    "image"=> "royalroulette.png"
                ],
                [
                    "game_id"=> "602803",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal Sic Bo",
                    "image"=> "royalsicbo.png"
                ],
                [
                    "game_id"=> "602804",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Royal Blackjack",
                    "image"=> "royalblackjack.png"
                ],
                [
                    "game_id"=> "602805",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=> "Royal 5 Box Blackjack",
                    "image"=> "royal5boxbj.png"
                ],
                [
                    "game_id"=> "602811",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Dragon Bonus",
                    "image"=> "dragonbonus.png"
                ],
                [
                    "game_id"=> "604501",
                    "provider_id"=> 11,
                    "game_type_id"=> 4,
                    "name_en"=>  "Money Roll",
                    "image"=> "moneyroll.png",
                ]
            ];

            foreach($data as $value)
            {

               GameList::create([
                   'game_id' => $value['game_id'],
                   'provider_id' => $value['provider_id'],
                   'game_type_id' => $value['game_type_id'],
                   'name_en' => $value['name_en'],
                   'image' => $value['image']
               ]);
            }

        }
}
