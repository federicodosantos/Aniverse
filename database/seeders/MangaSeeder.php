<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manga1 = [
            'title' => 'Crows',
            'synopsis' => "Harumichi Bōya transfers to Suzuran High, known for its delinquent students called 'Crows.' He soon joins a group led by Hiromi Kirishima, challenging the school boss Hideto Bandō. The story follows their exploits and conflicts with other gangs.",
            'studio' => 'Akita Shoten',
            'year' => 24,
            'episodes' => 26,
            'author' => 'Hiroshi Takahashi',
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/manga/poster/crows.jpg',
            'genre' => 'Yanki',
            'rating' => 5,
            'category_id' => 2,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($manga1);

        $manga2 = [
            'title' => 'Fullmetal Alchemist',
            'synopsis' => "Fullmetal Alchemist is set in the fictional country of Amestris, where alchemy is a widely practiced science. Government-employed alchemists, known as State Alchemists, are automatically given the rank of major in the military.",
            'studio' => 'Shounen',
            'year' => 2001,
            'episodes' => 27,
            'author' => 'Hiromu Arakawa',
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/manga/poster/fullmetal.jpg',
            'genre' => 'Adventure',
            'rating' => 5,
            'category_id' => 2,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($manga2);

        $manga3 = [
            'title' => 'Worst',
            'synopsis' => "Hana Tsukishima, a strong and honest country boy, moves to the city aiming to become Suzuran High's leader. He and his friends face numerous gangs and rival schools, navigating a world of clan logic and strength hierarchies.",
            'studio' => 'Akita Shoten',
            'year' => 2001,
            'episodes' => 33,
            'author' => 'Hiroshi Takahashi',
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/manga/poster/worst.jpg',
            'genre' => 'Yanki',
            'rating' => 4,
            'category_id' => 2,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($manga3);

        $manga4 = [
            'title' => 'Slam Dunk',
            'synopsis' => "Hanamichi Sakuragi, a high school delinquent, has been rejected by girls fifty times. At Shohoku High, he meets Haruko Akagi, who sees his potential and introduces him to basketball.",
            'studio' => 'Shueisha',
            'year' => 1990,
            'episodes' => 31,
            'author' => 'Takehiko Inoue',
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/manga/poster/slam%20dunk.jpg',
            'genre' => 'Sport',
            'rating' => 4,
            'category_id' => 2,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($manga4);

        $manga5 = [
            'title' => 'One Piece',
            'synopsis' => "The world of One Piece includes humans and various races like dwarves, giants, merfolk, fish-men, long-limbed tribes, Snakeneck Tribe, and Minks. It's governed by the World Government, an intercontinental organization of numerous member countries.",
            'studio' => 'Shueisha',
            'year' => 1999,
            'episodes' => 105,
            'author' => 'Eiichiro Oda',
            'status' => 'On-Going',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/manga/poster/one%20piece.jpg',
            'genre' => 'Adventure',
            'rating' => 5,
            'category_id' => 2,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($manga5);

        $manga6 = [
            'title' => 'Crows Explode',
            'synopsis' => "A month after Genji Takiya's graduation, transfer student Kaburagi Kazeo battles Kagami Ryohei for supremacy at Suzuran All-Boys High School, amidst an inter-school conflict with Kurosaki Industrial High.",
            'studio' => 'Akita Shoten',
            'year' => 2017,
            'episodes' => 9,
            'author' => 'Takahashi Hiroshi',
            'status' => 'Completed',
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/manga/poster/Explode.jpeg',
            'genre' => 'Yanki',
            'rating' => 4,
            'category_id' => 2,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('items')->insert($manga6);
    }
}
