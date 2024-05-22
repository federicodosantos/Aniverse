<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'id' => 1,
            'name' => 'Anime',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('category_items')->insert($data);

        $data2 = [
            'id' => 2,
            'name' => 'Manga',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DB::table('category_items')->insert($data2);
    }
}
