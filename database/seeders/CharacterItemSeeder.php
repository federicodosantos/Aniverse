<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $characters = [
            // Attack On Titan
            ['item_id' => 1, 'name' => 'Eren Yeager'],
            ['item_id' => 1, 'name' => 'Mikasa Ackerman'],
            ['item_id' => 1, 'name' => 'Armin Arlert'],
            ['item_id' => 1, 'name' => 'Levi Ackerman'],

            // Death Note
            ['item_id' => 2, 'name' => 'Light Yagami'],
            ['item_id' => 2, 'name' => 'L (L Lawliet)'],
            ['item_id' => 2, 'name' => 'Misa Amane'],
            ['item_id' => 2, 'name' => 'Ryuk'],

            // Monster
            ['item_id' => 3, 'name' => 'Dr. Kenzo Tenma'],
            ['item_id' => 3, 'name' => 'Johan Liebert'],
            ['item_id' => 3, 'name' => 'Nina Fortner'],
            ['item_id' => 3, 'name' => 'Inspector Lunge'],

            // Goblin Slayer
            ['item_id' => 4, 'name' => 'Goblin Slayer'],
            ['item_id' => 4, 'name' => 'Priestess'],
            ['item_id' => 4, 'name' => 'High Elf Archer'],
            ['item_id' => 4, 'name' => 'Dwarf Shaman'],

            // Berserk
            ['item_id' => 5, 'name' => 'Guts'],
            ['item_id' => 5, 'name' => 'Griffith'],
            ['item_id' => 5, 'name' => 'Casca'],
            ['item_id' => 5, 'name' => 'Puck'],

            // Hellsing
            ['item_id' => 6, 'name' => 'Alucard'],
            ['item_id' => 6, 'name' => 'Integra Hellsing'],
            ['item_id' => 6, 'name' => 'Seras Victoria'],
            ['item_id' => 6, 'name' => 'Alexander Anderson'],

            // Crows
            ['item_id' => 7, 'name' => 'Harumichi Bōya'],
            ['item_id' => 7, 'name' => 'Hiromi Kirishima'],
            ['item_id' => 7, 'name' => 'Hideto Bandō'],
            ['item_id' => 7, 'name' => 'Rindaman'],

            // Fullmetal Alchemist
            ['item_id' => 8, 'name' => 'Edward Elric'],
            ['item_id' => 8, 'name' => 'Alphonse Elric'],
            ['item_id' => 8, 'name' => 'Roy Mustang'],
            ['item_id' => 8, 'name' => 'Winry Rockbell'],

            // Worst
            ['item_id' => 9, 'name' => 'Hana Tsukishima'],
            ['item_id' => 9, 'name' => 'Takumi Fujishiro'],
            ['item_id' => 9, 'name' => 'Guriko'],
            ['item_id' => 9, 'name' => 'Shūgo Maki'],

            // Slam Dunk
            ['item_id' => 10, 'name' => 'Hanamichi Sakuragi'],
            ['item_id' => 10, 'name' => 'Kaede Rukawa'],
            ['item_id' => 10, 'name' => 'Takenori Akagi'],
            ['item_id' => 10, 'name' => 'Hisashi Mitsui'],

            // One Piece
            ['item_id' => 11, 'name' => 'Monkey D. Luffy'],
            ['item_id' => 11, 'name' => 'Roronoa Zoro'],
            ['item_id' => 11, 'name' => 'Nami'],
            ['item_id' => 11, 'name' => 'Sanji'],

            // Crows Explode
            ['item_id' => 12, 'name' => 'Kaburagi Kazeo'],
            ['item_id' => 12, 'name' => 'Kagami Ryohei'],
            ['item_id' => 12, 'name' => 'Fujiwara'],
            ['item_id' => 12, 'name' => 'Kenichi Asai'],
        ];

        foreach ($characters as $character) {
            DB::table('character_items')->insert([
                'item_id' => $character['item_id'],
                'name' => $character['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
