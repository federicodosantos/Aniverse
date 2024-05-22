<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anime1 = [
            'title' => 'Attack On Titan',
            'synopsis' => 'In a world where humanity lives in cities protected by three enormous walls from giant man-eating Titans, Eren Yeager vows to exterminate the Titans after they destroy his hometown and kill his mother.',
            'studio' => 'Wit Studio',
            'author' => 'Hajime Isayama',
            'year' => 2013,
            'episodes' => 94,
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/anime/poster/aot.jpg',
            'genre' => 'Dark Fantasy',
            'rating' => 5,
            'category_id' => 1,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($anime1);

        $anime2 = [
            'title' => 'Death Note',
            'synopsis' => 'An intelligent high school student goes on a secret crusade to eliminate criminals from the world after discovering a notebook capable of killing anyone whose name is written into it.',
            'studio' => 'Madhouse',
            'author' => 'Tsugumi Ohba',
            'year' => 2006,
            'episodes' => 37,
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/anime/poster/death%20note.jpg',
            'genre' => 'Supernatural',
            'rating' => 5,
            'category_id' => 1,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($anime2);

        $anime3 = [
            'title' => 'Monster',
            'synopsis' => 'Tenma, a brilliant neurosurgeon with a promising future, risks his career to save the life of a critically wounded young boy. The boy, now a charismatic young man, reappears 9 years later in the midst of a string of unusual serial murders.',
            'studio' => 'Madhouse',
            'author' => 'Naoki Urasawa',
            'year' => 2004,
            'episodes' => 75,
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/anime/poster/monster.jpg',
            'genre' => 'Crime',
            'rating' => 4,
            'category_id' => 1,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($anime3);

        $anime4 = [
            'title' => 'Goblin Slayer',
            'synopsis' => 'In a remote guild, an extraordinary man has reached Silver rank by killing goblins. A new priestess adventurer forms her first party, and when they encounter trouble, they are rescued by the Goblin Slayer.',
            'studio' => 'White Fox',
            'author' => 'Kumo Kagyu',
            'year' => 2018,
            'episodes' => 25,
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/anime/poster/goblin%20slayer.jpg',
            'genre' => 'Action',
            'rating' => 4,
            'category_id' => 1,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($anime4);

        $anime5 = [
            'title' => 'Bersek',
            'synopsis' => 'Born from a hanged corpse and raised by abusive adoptive father Gambino, Guts becomes a wandering mercenary after killing Gambino in self-defense. His skills attract Griffith, leader of the Band of the Hawk, who forces Guts to join after defeating him.',
            'studio' => 'Millepensee, GEMBA',
            'author' => 'Kentaro Miura',
            'year' => 1997,
            'episodes' => 25,
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/anime/poster/berserk.jpg',
            'genre' => 'Action',
            'rating' => 4,
            'category_id' => 1,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($anime5);

        $anime6 = [
            'title' => 'Hellsing',
            'synopsis' => 'Hellsing is named after and centered around the Royal Order of Protestant Knights originally led by Abraham Van Helsing. The mission of Hellsing is to search and destroy the undead and other supernatural of evil that threaten the queen and the country.',
            'studio' => 'Gonzo',
            'author' => 'Kouta hirano',
            'year' => 2001,
            'episodes' => 13,
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/anime/poster/hellsing.jpg',
            'genre' => 'Action',
            'rating' => 4,
            'category_id' => 1,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($anime6);
    }
}
