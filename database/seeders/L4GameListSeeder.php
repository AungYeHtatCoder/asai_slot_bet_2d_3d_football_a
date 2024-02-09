<?php

namespace Database\Seeders;

use App\Models\Admin\GameList;
use App\Models\GameTypeProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class L4GameListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "game_id" => "30030",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Santa Payday",
                "image" => "30030.jpg",

            ],
            [
                "game_id" => "30020",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Apes Squad",
                "image" => "30020.jpg",
            ],
            [
                "game_id" => "30006",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Crypto Coin",
                "image" => "30006.jpg",

            ],
            [
                "game_id" => "30029",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Bloodmoon Amazonia",
                "image" => "30029.jpg",

            ],
            [
                "game_id" => "30028",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Sanctum Of Savanah",
                "image" => "30028.jpg",

            ],
            [
                "game_id" => "5700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Queen Femida",
                "image" => "5700.jpg",

            ],
            [
                "game_id" => "6901",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Kraken Queen",
                "image" => "6901.jpg",

            ],
            [
                "game_id" => "10200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Lucky Coins",
                "image" => "10200.jpg",

            ],
            [
                "game_id" => "6900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Into The Fay=> Nixie",
                "image" => "6900.jpg",

            ],
            [
                "game_id" => "10301",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Panda's Realm",
                "image" => "10301.jpg",

            ],
            [
                "game_id" => "5500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "God Of Wealth",
                "image" => "5500.jpg",

            ],
            [
                "game_id" => "9200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dragon FAFAFA",
                "image" => "9200.jpg",

            ],
            [
                "game_id" => "2400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Panthera Pardus",
                "image" => "2400.jpg",

            ],
            [
                "game_id" => "16200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Candy Bomb",
                "image" => "16200.jpg",

            ],
            [
                "game_id" => "5800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Highway Kings",
                "image" => "5800.jpg",

            ],
            [
                "game_id" => "6800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Into The Fay=> Snowie",
                "image" => "6800.jpg",

            ],
            [
                "game_id" => "861005",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Mahjong Style",
                "image" => "861005.jpg",

            ],
            [
                "game_id" => "6200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Bonsai of Riches",
                "image" => "6200.jpg",

            ],
            [
                "game_id" => "2401",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Fortune Dance",
                "image" => "2401.jpg",

            ],
            [
                "game_id" => "8900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Feng Shen",
                "image" => "8900.jpg",

            ],
            [
                "game_id" => "5402",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Laughing Buddha",
                "image" => "5402.jpg",

            ],
            [
                "game_id" => "3000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Great Abundance",
                "image" => "3000.jpg",

            ],
            [
                "game_id" => "17300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Mobox",
                "image" => "17300.jpg",

            ],
            [
                "game_id" => "12200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "God Of Wealth 2",
                "image" => "12200.jpg",

            ],
            [
                "game_id" => "8000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dolphin Reef",
                "image" => "8000.jpg",

            ],
            [
                "game_id" => "830010",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Wu Kong 2",
                "image" => "arc017.jpg",

            ],
            [
                "game_id" => "1000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Evil King OX",
                "image" => "1000.png",

            ],
            [
                "game_id" => "5000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Buffalo Blaze",
                "image" => "5000.jpg",

            ],
            [
                "game_id" => "5701",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Axie Universe",
                "image" => "5701.jpg",

            ],
            [
                "game_id" => "6000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Great Blue",
                "image" => "6000.jpg",

            ],
            [
                "game_id" => "4600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dashing Inferno",
                "image" => "4600.jpg",

            ],
            [
                "game_id" => "861001",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "MetaSpace",
                "image" => "861001.jpg",

            ],
            [
                "game_id" => "7200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "The Great Sorcery",
                "image" => "7200.jpg",

            ],
            [
                "game_id" => "8400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Golden Monkey",
                "image" => "8400.jpg",

            ],
            [
                "game_id" => "830013",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Happy Fish 5",
                "image" => "arc020.jpg",

            ],
            [
                "game_id" => "15100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dragon's Wish",
                "image" => "15100.jpg",

            ],
            [
                "game_id" => "861008",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "BlackPink",
                "image" => "861008.jpg",

            ],
            [
                "game_id" => "15800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Happy Lantern",
                "image" => "15800.jpg",

            ],
            [
                "game_id" => "16900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Dragons Treasure",
                "image" => "16900.jpg",

            ],
            [
                "game_id" => "7300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dazzling Star",
                "image" => "7300.jpg",

            ],
            [
                "game_id" => "30021",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "MaskofTruth",
                "image" => "30021.jpg",

            ],
            [
                "game_id" => "861004",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Illuvium",
                "image" => "861004.jpg",

            ],
            [
                "game_id" => "7900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Jin Qian Wa",
                "image" => "7900.jpg",

            ],
            [
                "game_id" => "861002",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Classic Diamond x5",
                "image" => "861002.jpg",

            ],
            [
                "game_id" => "4500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "God of Three",
                "image" => "4500.jpg",

            ],
            [
                "game_id" => "10100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Jewel Twinkles",
                "image" => "10100.jpg",

            ],
            [
                "game_id" => "861006",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Fortune Realm",
                "image" => "861006.jpg",

            ],
            [
                "game_id" => "3800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "The Majestic Taj",
                "image" => "3800.jpg",

            ],
            [
                "game_id" => "9000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "5 Dragons",
                "image" => "9000.jpg",

            ],
            [
                "game_id" => "7601",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Fortune Twins",
                "image" => "7601.jpg",

            ],
            [
                "game_id" => "3200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Guardians of Flower",
                "image" => "3200.jpg",

            ],
            [
                "game_id" => "13200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Hot Wheel Spin",
                "image" => "13200.jpg",

            ],
            [
                "game_id" => "12400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Golden Lion",
                "image" => "12400.jpg",

            ],
            [
                "game_id" => "16100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Mighty Cash Dragon",
                "image" => "16100.jpg",

            ],
            [
                "game_id" => "17000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Mask Of Truth Jumboways",
                "image" => "17000.jpg",

            ],
            [
                "game_id" => "800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Lucky Fortune",
                "image" => "800.png",

            ],
            [
                "game_id" => "1300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Tank Attack",
                "image" => "1300.png",

            ],
            [
                "game_id" => "8501",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Huga",
                "image" => "8501.jpg",

            ],
            [
                "game_id" => "10300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Golden Coyote",
                "image" => "10300.jpg",

            ],
            [
                "game_id" => "851000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Fire Ballon",
                "image" => "851000.jpg",

            ],
            [
                "game_id" => "11300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Dragon Blaze",
                "image" => "11300.jpg",

            ],
            [
                "game_id" => "8200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Bonus Bear",
                "image" => "8200.jpg",

            ],
            [
                "game_id" => "9700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Nezha and Aobing",
                "image" => "9700.jpg",

            ],
            [
                "game_id" => "10500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Money Cluster",
                "image" => "10500.jpg",

            ],
            [
                "game_id" => "9600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Medusa's Quest",
                "image" => "9600.jpg",

            ],
            [
                "game_id" => "8600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Golden Lotus ",
                "image" => "8600.jpg",

            ],
            [
                "game_id" => "7800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Panther Moon",
                "image" => "7800.jpg",

            ],
            [
                "game_id" => "4400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Bruce the Legend",
                "image" => "4400.jpg",

            ],
            [
                "game_id" => "820002",
                "provider_id" => 6,
                "game_type_id" => 2,
                "name_en" => "Roulette",
                "image" => "820002.jpg",

            ],
            [
                "game_id" => "3700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Sparta's Legacy",
                "image" => "3700.jpg",

            ],
            [
                "game_id" => "13901",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Olympia Wild",
                "image" => "13901.jpg",

            ],
            [
                "game_id" => "9400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Into the Fay=> Ashley",
                "image" => "9400.jpg",

            ],
            [
                "game_id" => "9500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Fiery Lady",
                "image" => "9500.jpg",

            ],
            [
                "game_id" => "8800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Three Kingdoms",
                "image" => "8800.jpg",

            ],
            [
                "game_id" => "11200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Odyssey To The West ",
                "image" => "11200.jpg",

            ],
            [
                "game_id" => "15600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Imperial Kingdom",
                "image" => "15600.jpg",

            ],
            [
                "game_id" => "11000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dragon's Palace",
                "image" => "11000.jpg",

            ],
            [
                "game_id" => "2800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "3x Dragon Supreme",
                "image" => "2800.jpg",

            ],
            [
                "game_id" => "1500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Fairy Moon Goddess",
                "image" => "1500.png",

            ],
            [
                "game_id" => "6100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Roaring Stripes",
                "image" => "6100.jpg",

            ],
            [
                "game_id" => "8500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Water Margin",
                "image" => "8500.jpg",

            ],
            [
                "game_id" => "5100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Gorilla's Tribe",
                "image" => "5100.jpg",

            ],
            [
                "game_id" => "3900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Age of Golden Ape",
                "image" => "3900.jpg",

            ],
            [
                "game_id" => "2600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Justice Bao",
                "image" => "2600.jpg",

            ],
            [
                "game_id" => "11901",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Prosperity New Year",
                "image" => "11901.jpg",

            ],
            [
                "game_id" => "2300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Treasures In Varna",
                "image" => "2300.jpg",

            ],
            [
                "game_id" => "851003",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Dragon Ball",
                "image" => "851003.jpg",

            ],
            [
                "game_id" => "861018",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Jarvis",
                "image" => "861018.jpg",

            ],
            [
                "game_id" => "5401",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Sexy Beach Party",
                "image" => "5401.jpg",

            ],
            [
                "game_id" => "12900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Santa's Joy",
                "image" => "12900.jpg",

            ],
            [
                "game_id" => "820007",
                "provider_id" => 6,
                "game_type_id" => 2,
                "name_en" =>  "Crab And Shrimp",
                "image" => "820007.jpg",

            ],
            [
                "game_id" => "861003",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Oni Cosmic Atlas",
                "image" => "861003.jpg",

            ],
            [
                "game_id" => "16700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Lucky Charm",
                "image" => "16700.jpg",

            ],
            [
                "game_id" => "1800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Gummy Wonderland",
                "image" => "1800.png",

            ],
            [
                "game_id" => "8101",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Wealthy Paradise",
                "image" => "8101.jpg",

            ],
            [
                "game_id" => "5400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Pan Jin Lian",
                "image" => "5400.jpg",

            ],
            [
                "game_id" => "4100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Samurai Sensei",
                "image" => "4100.jpg",

            ],
            [
                "game_id" => "10400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Football Goal",
                "image" => "10400.jpg",

            ],
            [
                "game_id" => "7801",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Safari Heat",
                "image" => "7801.jpg",

            ],
            [
                "game_id" => "14000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Battle Fortune",
                "image" => "14000.jpg",

            ],
            [
                "game_id" => "4300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Outlawed Gunslinger",
                "image" => "4300.jpg",

            ],
            [
                "game_id" => "3400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Spirit Bear",
                "image" => "3400.jpg",

            ],
            [
                "game_id" => "8100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Thai Paradise",
                "image" => "8100.jpg",

            ],
            [
                "game_id" => "11201",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Cleopatra's Wishes",
                "image" => "11201.jpg",

            ],
            [
                "game_id" => "10600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Vegas Royale",
                "image" => "10600.jpg",

            ],
            [
                "game_id" => "11600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Three Kingdoms 2",
                "image" => "11600.jpg",

            ],
            [
                "game_id" => "7500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Into The Fay=> Misty",
                "image" => "7500.jpg",

            ],
            [
                "game_id" => "16500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Princess The Evil Witch",
                "image" => "16500.jpg",

            ],
            [
                "game_id" => "4200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Clover's Tales",
                "image" => "4200.jpg",

            ],
            [
                "game_id" => "6400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Bloody Seduction",
                "image" => "6400.jpg",

            ],
            [
                "game_id" => "3901",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Dreams of American",
                "image" => "3901.jpg",

            ],
            [
                "game_id" => "7600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Aye Aye Captain!",
                "image" => "7600.jpg",

            ],
            [
                "game_id" => "8300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Robin Hood",
                "image" => "8300.jpg",

            ],
            [
                "game_id" => "851001",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Super Splash Party",
                "image" => "851001.jpg",

            ],
            [
                "game_id" => "5200",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Midnight Carnival",
                "image" => "5200.jpg",

            ],
            [
                "game_id" => "2500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Southern Fortune Lion",
                "image" => "2500.jpg",

            ],
            [
                "game_id" => "6700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Thriving Wilds",
                "image" => "6700.jpg",

            ],
            [
                "game_id" => "10800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Burning Wheel",
                "image" => "10800.jpg",

            ],
            [
                "game_id" => "10700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Rampage Tribe",
                "image" => "10700.jpg",

            ],
            [
                "game_id" => "12500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Dragon 7",
                "image" => "12500.jpg",

            ],
            [
                "game_id" => "13000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "White Queen",
                "image" => "13000.jpg",

            ],
            [
                "game_id" => "5900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Money Bang Bang",
                "image" => "5900.jpg",

            ],
            [
                "game_id" => "15000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Soccer Fiesta",
                "image" => "15000.jpg",

            ],
            [
                "game_id" => "3300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "The Mythical Unicorn",
                "image" => "3300.jpg",

            ],
            [
                "game_id" => "6300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Diego Z",
                "image" => "6300.jpg",

            ],
            [
                "game_id" => "12801",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Divine Blessing",
                "image" => "12801.jpg",

            ],
            [
                "game_id" => "10901",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "El Guitarrista",
                "image" => "10901.jpg",

            ],
            [
                "game_id" => "13900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Tiki Gold",
                "image" => "13900.jpg",

            ],
            [
                "game_id" => "4000",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Dr Eerie's Experiment",
                "image" => "4000.jpg",

            ],
            [
                "game_id" => "820006",
                "provider_id" => 6,
                "game_type_id" => 2,
                "name_en" =>  "Bull Fight",
                "image" => "820006.jpg",

            ],
            [
                "game_id" => "830009",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Fishing War",
                "image" => "arc016.jpg",

            ],
            [
                "game_id" => "11500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "G.O.T=>Winterfell ",
                "image" => "11500.jpg",

            ],
            [
                "game_id" => "16300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "The Third Prince",
                "image" => "16300.jpg",

            ],
            [
                "game_id" => "3600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Little Fantail",
                "image" => "3600.jpg",

            ],
            [
                "game_id" => "7700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Irish Luck",
                "image" => "7700.jpg",

            ],
            [
                "game_id" => "10900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Divine Palace",
                "image" => "10900.jpg",

            ],
            [
                "game_id" => "851004",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "KingOfSpade",
                "image" => "851004.jpg",

            ],
            [
                "game_id" => "16400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "The Red Empress",
                "image" => "16400.jpg",

            ],
            [
                "game_id" => "12100",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "G.O.T=>Dragonheir ",
                "image" => "12100.jpg",

            ],
            [
                "game_id" => "12800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Wealth Of Zodiac",
                "image" => "12800.jpg",

            ],
            [
                "game_id" => "9800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Birdy Trouble",
                "image" => "9800.jpg",

            ],
            [
                "game_id" => "13600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Lunar Princess",
                "image" => "13600.jpg",

            ],
            [
                "game_id" => "861019",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Block Buster",
                "image" => "861019.jpg",

            ],
            [
                "game_id" => "12600",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "G.O.T=>Iron Throne",
                "image" => "12600.jpg",

            ],
            [
                "game_id" => "7301",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Royal Tank",
                "image" => "7301.jpg",

            ],
            [
                "game_id" => "14900",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "Olympic Glory",
                "image" => "14900.jpg",

            ],
            [
                "game_id" => "14400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Men In Black 2",
                "image" => "14400.jpg",

            ],
            [
                "game_id" => "13300",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "G.O.T Siege War",
                "image" => "13300.jpg",

            ],
            [
                "game_id" => "13800",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Men In Black",
                "image" => "13800.jpg",

            ],
            [
                "game_id" => "14700",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Men In Black International",
                "image" => "14700.jpg",

            ],
            [
                "game_id" => "13400",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" => "G.O.T Lannister",
                "image" => "13400.jpg",

            ],
            [
                "game_id" => "14500",
                "provider_id" => 6,
                "game_type_id" => 4,
                "name_en" =>  "Men In Black 3",
                "image" => "14500.jpg",

            ],
            [
                "game_id" => "820004",
                "provider_id" => 6,
                "game_type_id" => 2,
                "name_en" =>  "Dragon Tiger",
                "image" => "820004.jpg",

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

