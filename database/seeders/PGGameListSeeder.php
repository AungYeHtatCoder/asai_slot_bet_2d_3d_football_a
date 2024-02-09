<?php

namespace Database\Seeders;

use App\Models\Admin\GameList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PGGameListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //PG
        $data = [
                    [
                    "game_id"=> "1",
                    "name_en"=> "Honey Trap of Diao Chan",
                    "provider_id"=> 8,
                    "game_type_id"=> 4,
                    "image" => "diaochan.png"
                    ],
                    [
                    "game_id"=> "2",
                    "name_en"=> "Gem Saviour",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "gem-saviour.png"

                    ],
                    [
                    "game_id"=> "3",
                    "name_en"=> "Fortune Gods",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fortune-gods.png"
                    ],
                    [
                    "game_id"=> "6",
                    "name_en"=> "Medusa 2: The Quest of Perseus",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "medusa2.png",
                    ],
                    [
                    "game_id"=> "7",
                    "name_en"=> "Medusa 1 : The Curse of Athena",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "medusa.png",

                    ],
                    [
                    "game_id"=> "17",
                    "name_en"=> "Wizdom Wonders",
                    "provider_id"=> 8,
                    "game_type_id"=> 4,
                    "image" =>  "wizdom-wonders.jpg",
                    ],
                    [
                    "game_id"=> "18",
                    "name_en"=> "Hood vs Wolf",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "hood-wolf.png",
                    ],
                    [
                    "game_id"=> "20",
                    "name_en"=> "Reel Love",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "reel-love.png"
                    ],
                    [
                    "game_id"=> "24",
                    "name_en"=> "Win Win Won",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "win-win-won.png",
                    ],
                    [
                    "game_id"=> "25",
                    "name_en"=> "Plushie Frenzy",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "plushie-frenzy.png",

                    ],
                    [
                    "game_id"=> "26",
                    "name_en"=> "Tree of Fortune",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fortune-tree.png",

                    ],
                    [
                    "game_id"=> "28",
                    "name_en"=> "Hotpot",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image"=> "hotpot.png",
                    ],
                    [
                    "game_id"=> "29",
                    "name_en"=> "Dragon Legend",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "dragon-legend.png",
                    ],
                    [
                    "game_id"=> "31",
                    "name_en"=> "Baccarat Deluxe",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "baccarat-deluxe.png",
                    ],
                    [
                    "game_id"=> "33",
                    "name_en"=> "Hip Hop Panda",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "hip-hop-panda.png"
                    ],
                    [
                    "game_id"=> "34",
                    "name_en"=> "Legend of Hou Yi",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "legend-of-hou-yi.png",
                    ],
                    [
                    "game_id"=> "35",
                    "name_en"=> "Mr. Hallow-Win",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "mr-hallow-win.png",
                    ],
                    [
                    "game_id"=> "36",
                    "name_en"=> "Prosperity Lion",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "prosperity-lion.png",
                    ],
                    [
                    "game_id"=> "37",
                    "name_en"=> "Santa's Gift Rush",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "santas-gift-rush.png",
                    ],
                    [
                    "game_id"=> "38",
                    "name_en"=> "Gem Saviour Sword",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "gem-saviour-sword.png",

                    ],
                    [
                    "game_id"=> "39",
                    "name_en"=> "Piggy Gold",
                    "gameCode"=> "piggy-gold",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "piggy-gold.png",

                    ],
                    [
                    "game_id"=> "40",
                    "name_en"=> "Jungle Delight",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"jungle-delight.png",
                    ],
                    [
                    "game_id"=> "41",
                    "name_en"=> "Symbols Of Egypt",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "symbols-of-egypt.png",
                    ],
                    [
                    "game_id"=> "42",
                    "name_en"=> "Ganesha Gold",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "ganesha-gold.png",
                    ],
                    [
                    "game_id"=> "43",
                    "name_en"=> "Three Monkeys",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "jungle-delight.png",
                    ],
                    [
                    "game_id"=> "44",
                    "name_en"=> "Emperor's Favour",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "emperors-favour.png",
                    ],
                    [
                    "game_id"=> "48",
                    "name_en"=> "Double Fortune",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "double-fortune.png",
                    ],
                    [
                    "game_id"=> "50",
                    "name_en"=> "Journey to the Wealth",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"journey-to-the-wealth.png",

                    ],
                    [
                    "game_id"=> "53",
                    "name_en"=> "The Great Icescape",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "the-great-icescape.png",

                    ],
                    [
                    "game_id"=> "54",
                    "name_en"=> "Captain's Bounty",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "captains-bounty.png",
                    ],
                    [
                    "game_id"=> "57",
                    "name_en"=> "Dragon Hatch",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "dragon-hatch.png",
                    ],
                    [
                    "game_id"=> "58",
                    "name_en"=> "Vampire's Charm",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "vampires-charm.png",
                    ],
                    [
                    "game_id"=> "59",
                    "name_en"=> "Ninja vs Samurai",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "ninja-vs-samurai.png",
                    ],
                    [
                    "game_id"=> "60",
                    "name_en"=> "Leprechaun Riches",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "leprechaun-riches.png",

                    ],
                    [
                    "game_id"=> "61",
                    "name_en"=> "Flirting Scholar",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "flirting-scholar.png",
                    ],
                    [
                    "game_id"=> "62",
                    "name_en"=> "Gem Saviour Conquest",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "gem-saviour-conquest.png",
                    ],
                    [
                    "game_id"=> "63",
                    "name_en"=> "Dragon Tiger Luck",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "dragon-tiger-luck.png",

                    ],
                    [
                    "game_id"=> "64",
                    "name_en"=> "Muay Thai Champion",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "muay-thai-champion.png",
                    ],
                    [
                    "game_id"=> "65",
                    "name_en"=> "Mahjong Ways",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "mahjong-ways.png",
                    ],
                    [
                    "game_id"=> "67",
                    "name_en"=> "Shaolin Soccer",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "shaolin-soccer.png",

                    ],
                    [
                    "game_id"=> "68",
                    "name_en"=> "Fortune Mouse",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fortune-mouse.png",
                    ],
                    [
                    "game_id"=> "69",
                    "name_en"=> "Bikini Paradise",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "bikini-paradise.png",

                    ],
                    [
                    "game_id"=> "70",
                    "name_en"=> "Candy Burst",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "candy-burst.png",
                    ],
                    [
                    "game_id"=> "71",
                    "name_en"=> "CaiShen Wins",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "cai-shen-wins.png",

                    ],
                    [
                    "game_id"=> "73",
                    "name_en"=> "Egypt's Book of Mystery",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "egypts-book-mystery.png",
                    ],
                    [
                    "game_id"=> "74",
                    "name_en"=> "Mahjong Ways 2",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "mahjong-ways2.png",

                    ],
                    [
                    "game_id"=> "75",
                    "name_en"=> "Ganesha Fortune",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "ganesha-fortune.png",

                    ],
                    [
                    "game_id"=> "79",
                    "name_en"=> "Dreams of Macau",
                    "provider_id"=> 8,
                   "game_type_id"=> 4,
                    "image" => "dreams-of-macau.png",

                    ],
                    [
                    "game_id"=> "80",
                    "name_en"=> "Circus Delight",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "circus-delight.png",

                    ],
                    [
                    "game_id"=> "82",
                    "name_en"=> "Phoenix Rises",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "phoenix-rises.png",
                    ],
                    [
                    "game_id"=> "83",
                    "name_en"=> "Wild Fireworks",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "wild-fireworks.png",

                    ],
                    [
                    "game_id"=> "84",
                    "name_en"=> "Queen of Bounty",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "queen-bounty.png",
                    ],
                    [
                    "game_id"=> "85",
                    "name_en"=> "Genie's 3 Wishes",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"genies-wishes.png",

                    ],
                    [
                    "game_id"=> "86",
                    "name_en"=> "Galactic Gems",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "galactic-gems.png",

                    ],
                    [
                    "game_id"=> "87",
                    "name_en"=> "Treasures of Aztec",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "treasures-aztec.png",

                    ],
                    [
                    "game_id"=> "88",
                    "name_en"=> "Jewels of Prosperity",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "jewels-prosper.png",

                    ],
                    [
                    "game_id"=> "89",
                    "name_en"=> "Lucky Neko",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "lucky-neko.png",

                    ],
                    [
                    "game_id"=> "90",
                    "name_en"=> "Secrets of Cleopatra",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "sct-cleopatra.png",
                    ],
                    [
                    "game_id"=> "91",
                    "name_en"=> "Guardians of Ice & Fire",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "gdn-ice-fire.png",

                    ],
                    [
                    "game_id"=> "92",
                    "name_en"=> "Thai River Wonders",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>  "thai-river.png",

                    ],
                    [
                    "game_id"=> "93",
                    "name_en"=> "Opera Dynasty",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "opera-dynasty.png",
                    ],
                    [
                    "game_id"=> "94",
                    "name_en"=> "Bali Vacation",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "bali-vacation.png",
                    ],
                    [
                    "game_id"=> "95",
                    "name_en"=> "Majestic Treasures",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "majestic-ts.png",
                    ],
                    [
                    "game_id"=> "97",
                    "name_en"=> "Jack Frost's Winter",
                    "gameCode"=> "jack-frosts",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"jack-frosts.png",
                    ],
                    [
                    "game_id"=> "98",
                    "name_en"=> "Fortune Ox",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fortune-ox.png",

                    ],
                    [
                    "game_id"=> "100",
                    "name_en"=> "Candy Bonanza",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "candy-bonanza.png",
                    ],
                    [
                    "game_id"=> "101",
                    "name_en"=> "Rise of Apollo",
                    "gameCode"=> "rise-of-apollo",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "rise-of-apollo.png",

                    ],
                    [
                    "game_id"=> "102",
                    "name_en"=> "Mermaid Riches",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "mermaid-riches.png",
                    ],
                    [
                    "game_id"=> "103",
                    "name_en"=> "Crypto Gold",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "crypto-gold.png",
                    ],
                    [
                    "game_id"=> "104",
                    "name_en"=> "Wild Bandito",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "wild-bandito.png",
                    ],
                    [
                    "game_id"=> "105",
                    "name_en"=> "Heist Stakes",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "heist-stakes.png",
                    ],
                    [
                    "game_id"=> "106",
                    "name_en"=> "Ways of the Qilin",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "ways-of-qilin.png",

                    ],
                    [
                    "game_id"=> "107",
                    "name_en"=> "Legendary Monkey King",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "lgd-monkey-kg.png",
                    ],
                    [
                    "game_id"=> "108",
                    "name_en"=> "Buffalo Win",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "buffalo-win.png",

                    ],
                    [
                    "game_id"=> "109",
                    "name_en"=> "Sushi Oishi",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "oriental-pros.png",

                    ],
                    [
                    "game_id"=> "110",
                    "name_en"=> "Jurassic Kingdom",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "jurassic-kdm.png",

                    ],
                    [
                    "game_id"=> "111",
                    "name_en"=> "Groundhog Harvest",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"groundhog.png",
                    ],
                    [
                    "game_id"=> "112",
                    "name_en"=> "Oriental Prosperity",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"oriental-pros.png",
                    ],
                    [
                    "game_id"=> "113",
                    "name_en"=> "Raider Jane's Crypt of Fortune",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "crypt-fortune.png",

                    ],
                    [
                    "game_id"=> "114",
                    "name_en"=> "Emoji Riches",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "emoji-riches.png",
                    ],
                    [
                    "game_id"=> "115",
                    "name_en"=> "Supermarket Spree",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "sprmkt-spree.png",

                    ],
                    [
                    "game_id"=> "116",
                    "name_en"=> "Farm Invaders",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "sprmkt-spree.png",

                    ],
                    [
                    "game_id"=> "117",
                    "name_en"=> "Cocktail Nights",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "cocktail-nite.png",
                    ],
                    [
                    "game_id"=> "118",
                    "name_en"=> "Mask Carnival",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "mask-carnival.png",
                    ],
                    [
                    "game_id"=> "119",
                    "name_en"=> "Spirited Wonders",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "spirit-wonder.png",

                    ],
                    [
                    "game_id"=> "120",
                    "name_en"=> "The Queen's Banquet",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"queen-banquet.png",

                    ],
                    [
                    "game_id"=> "121",
                    "name_en"=> "Destiny of Sun & Moon",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "dest-sun-moon.png",

                    ],
                    [
                    "game_id"=> "122",
                    "name_en"=> "Garuda Gems",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "garuda-gems.png",

                    ],
                    [
                    "game_id"=> "123",
                    "name_en"=> "Rooster Rumble",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "rooster-rbl.png",

                    ],
                    [
                    "game_id"=> "124",
                    "name_en"=> "Battleground Royale",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "battleground.png",

                    ],
                    [
                    "game_id"=> "125",
                    "name_en"=> "Butterfly Blossom",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "btrfly-blossom.png",

                    ],
                    [
                    "game_id"=> "126",
                    "name_en"=> "Fortune Tiger",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fortune-tiger.png",
                    ],
                    [
                    "game_id"=> "127",
                    "name_en"=> "Speed Winner",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "speed-winner.png",

                    ],
                    [
                    "game_id"=> "128",
                    "name_en"=> "Legend of Perseus",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "legend-perseus.png",

                    ],
                    [
                    "game_id"=> "129",
                    "name_en"=> "Win Win Fish Prawn Crab",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "win-win-fpc.png",

                    ],
                    [
                    "game_id"=> "130",
                    "name_en"=> "Lucky Piggy",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "lucky-piggy.png",

                    ],
                    [
                    "game_id"=> "132",
                    "name_en"=> "Wild Coaster",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>  "wild-coaster.png",

                    ],
                    [
                    "game_id"=> "135",
                    "name_en"=> "Wild Bounty Showdown",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "wild-bounty-sd.png",

                    ],
                    [
                    "game_id"=> "1312883",
                    "name_en"=> "Prosperity Fortune Tree",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "prosper-ftree.png",

                    ],
                    [
                    "game_id"=> "1338274",
                    "name_en"=> "Totem Wonders",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "totem-wonders.png",

                    ],
                    [
                    "game_id"=> "1340277",
                    "name_en"=> "Asgardian Rising",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>"asgardian-rs.png",

                    ],
                    [
                    "game_id"=> "1368367",
                    "name_en"=> "Alchemy Gold",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "alchemy-gold.png",

                    ],
                    [
                    "game_id"=> "1372643",
                    "name_en"=> "Diner Delights",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "diner-delights.png",

                    ],
                    [
                    "game_id"=> "1381200",
                    "name_en"=> "Hawaiian Tiki",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "hawaiian-tiki.png",

                    ],
                    [
                    "game_id"=> "1397455",
                    "name_en"=> "Fruity Candy",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fruity-candy.png",

                    ],
                    [
                    "game_id"=> "1402846",
                    "name_en"=> "Midas Fortune",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "midas-fortune.png",
                    ],
                    [
                    "game_id"=> "1418544",
                    "name_en"=> "Bakery Bonanza",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "bakery-bonanza.png",
                    ],
                    [
                    "game_id"=> "1420892",
                    "name_en"=> "Rave Party Fever",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "rave-party-fvr.png",

                    ],
                    [
                    "game_id"=> "1432733",
                    "name_en"=> "Mystical Spirits",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "myst-spirits.png",

                    ],
                    [
                    "game_id"=> "1448762",
                    "name_en"=> "Songkran Splash",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "songkran-spl.png",
                    ],
                    [
                    "game_id"=> "1473388",
                    "name_en"=> "Cruise Royale",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "cruise-royale.png",

                    ],
                    [
                    "game_id"=> "1489936",
                    "name_en"=> "Ultimate Striker",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "ult-striker.png",

                    ],
                    [
                    "game_id"=> "1513328",
                    "name_en"=> "Super Golf Drive",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "spr-golf-drive.png",

                    ],
                    [
                    "game_id"=> "1529867",
                    "name_en"=> "Ninja Raccoon Frenzy",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "ninja-raccoon.png",

                    ],
                    [
                    "game_id"=> "1543462",
                    "name_en"=> "Fortune Rabbit",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "fortune-rabbit.png",

                    ],
                    [
                    "game_id"=> "1555350",
                    "name_en"=> "Forge of Wealth",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" =>  "forge-wealth.png",

                    ],
                    [
                    "game_id"=> "1568554",
                    "name_en"=> "Wild Heist Cashout",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "wild-heist-co.png",

                    ],
                    [
                    "game_id"=> "1572362",
                    "name_en"=> "Gladiator's Glory",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "gladi-glory.png",
                    ],
                    [
                    "game_id"=> "1580541",
                    "name_en"=> "Mafia Mayhem",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "mafia-mayhem.png",
                    ],
                    [
                    "game_id"=> "1594259",
                    "name_en"=> "Safari Wilds",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "safari-wilds.png",
                    ],
                    [
                    "game_id"=> "1601012",
                    "name_en"=> "Lucky Clover Lady",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "lucky-clover.png",

                    ],
                    [
                    "game_id"=> "1655268",
                    "name_en"=> "Tsar Treasures",
                    "provider_id"=> 8,

                    "game_type_id"=> 4,
                    "image" => "tsar-treasures.png",

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
