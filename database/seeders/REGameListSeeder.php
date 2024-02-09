<?php

namespace Database\Seeders;

use App\Models\Admin\GameList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class REGameListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $data = [
                    [
                        "game_id"=>"KMQM_Sugar_Blast",
                        "provider_id" => 10,
                        "game_type_id"=> 4,
                        "name_en"=>"Sugar Blast",
                        "image"=>"Game_KMQM_Sugar_Blast_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Dragon_Tiger_2",
                        "provider_id" => 10,
                        "game_type_id"=> 4,
                        "name_en"=>"Dragon Tiger 2",
                        "image"=>"Game_KMQM_Dragon_Tiger_2_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Viet_Fish_Prawn_Crab",
                        "provider_id" => 10,
                        "game_type_id"=> 4,
                        "name_en"=>"Viet Fish Prawn Crab",
                        "image"=>"Game_KMQM_Viet_Fish_Prawn_Crab_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Bai_Cao",
                        "provider_id" => 10,
                        "game_type_id"=> 4,
                        "name_en"=>"Bai Cao",
                        "image"=>"Game_KMQM_Bai_Cao_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_KM_Virtual_Animal_Race",
                        "provider_id" => 10,
                        "game_type_id"=> 4,
                        "name_en"=>"KM Virtual Animal Race",
                        "image"=>"Game_KMQM_KM_Virtual_Animal_Race_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Kingmaker_Pok_Deng",
                        "provider_id" => 10,
                        "game_type_id"=> 4,
                        "name_en"=>"Kingmaker Pok Deng",
                        "image"=>"Game_KMQM_Kingmaker_Pok_Deng_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Coin_Toss",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Coin Toss",
                        "image"=>"Game_KMQM_Coin_Toss_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Jhandi_Munda",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Jhandi Munda",
                        "image"=>"Game_KMQM_Jhandi_Munda_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Andar_Bahar",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Andar Bahar",
                        "image"=>"Game_KMQM_Andar_Bahar_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Poker_Roulette",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Poker Roulette",
                        "image"=>"Game_KMQM_Poker_Roulette_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Sicbo",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Sicbo",
                        "image"=>"Game_KMQM_Sicbo_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Thai_Fish_Prawn_Crab",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Thai Fish Prawn Crab",
                        "image"=>"Game_KMQM_Thai_Fish_Prawn_Crab_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_European_Roulette",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"European Roulette",
                        "image"=>"Game_KMQM_European_Roulette_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Bola_Tangkas",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Bola Tangkas",
                        "image"=>"Game_KMQM_Bola_Tangkas_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Fruit_Roulette",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Fruit Roulette",
                        "image"=>"Game_KMQM_Fruit_Roulette_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Blackjack",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Blackjack",
                        "image"=>"Game_KMQM_Blackjack_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Minesweeper",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Minesweeper",
                        "image"=>"Game_KMQM_Minesweeper_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Teen_Patti",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Teen Patti",
                        "image"=>"Game_KMQM_Teen_Patti_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Tai_Xiu",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Tai Xiu",
                        "image"=>"Game_KMQM_Tai_Xiu_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Cash_Rocket",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Cash Rocket",
                        "image"=>"Game_KMQM_Cash_Rocket_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Baccarat",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Baccarat",
                        "image"=>"Game_KMQM_Baccarat_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Fan_Tan_Classic",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Fan Tan Classic",
                        "image"=>"Game_KMQM_Fan_Tan_Classic_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Max_Keno",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Max Keno",
                        "image"=>"Game_KMQM_Max_Keno_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_KM_Virtual_Treadmill_Racing",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"KM Virtual Treadmill Racing",
                        "image"=>"Game_KMQM_KM_Virtual_Treadmill_Racing_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Heist",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Heist",
                        "image"=>"Game_KMQM_Heist_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Color_Game",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Colour Game",
                        "image"=>"Game_KMQM_Color_Game_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Dota_Hi-Lo",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Dota Hi-Lo",
                        "image"=>"Game_KMQM_Dota_Hi-Lo_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_KM_Virtual_Hound_Racing",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"KM Virtual Greyhound Racing",
                        "image"=>"Game_KMQM_KM_Virtual_Hound_Racing_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Bola_Golek",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Bola Golek",
                        "image"=>"Game_KMQM_Bola_Golek_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Tongits",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Tongits",
                        "image"=>"Game_KMQM_Tongits_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Ludo",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Ludo",
                        "image"=>"Game_KMQM_Ludo_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Bonus_Dice",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Bonus Dice",
                        "image"=>"Game_KMQM_Bonus_Dice_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Triple_Chance",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Triple Chance",
                        "image"=>"Game_KMQM_Triple_Chance_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_KM_Marble_Knockout",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"KM Marble Knockout",
                        "image"=>"Game_KMQM_KM_Marble_Knockout_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Bai_Buu",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Bai Buu",
                        "image"=>"Game_KMQM_Bai_Buu_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Monkey_King_Roulette",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Monkey King Roulette",
                        "image"=>"Game_KMQM_Monkey_King_Roulette_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Thai_Hi_Lo_2",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Thai Hi Lo 2",
                        "image"=>"Game_KMQM_Thai_Hi_Lo_2_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Fish_Prawn_Crab_2",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Fish Prawn Crab 2",
                        "image"=>"Game_KMQM_Fish_Prawn_Crab_2_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_KM_Virtual_Horse_Racing",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"KM Virtual Horse Racing",
                        "image"=>"Game_KMQM_KM_Virtual_Horse_Racing_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Belangkai_2",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Belangkai 2",
                        "image"=>"Game_KMQM_Belangkai_2_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Pai_Kang",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Pai Kang",
                        "image"=>"Game_KMQM_Pai_Kang_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Plinko",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Plinko",
                        "image"=>"Game_KMQM_Plinko_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Xoc_Dia_Lightning",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Xoc Dia Lightning",
                        "image"=>"Game_KMQM_Xoc_Dia_Lightning_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_7_Up_7_Down",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"7 Up 7 Down",
                        "image"=>"Game_KMQM_7_Up_7_Down_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_5_Card_Poker",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"5 Card Poker",
                        "image"=>"Game_KMQM_5_Card_Poker_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Cards_Hi_Lo",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"Cards Hi Lo",
                        "image"=>"Game_KMQM_Cards_Hi_Lo_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_Bingo_Roll",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"KM Power Ball",
                        "image"=>"Game_KMQM_Bingo_Roll_343x200.jpg",

                    ],
                    [
                        "game_id"=>"KMQM_32_Cards",
                        "provider_id" => 10,

                        "game_type_id"=> 4,
                        "name_en"=>"32 Cards",
                        "image"=>"Game_KMQM_32_Cards_343x200.jpg",

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
