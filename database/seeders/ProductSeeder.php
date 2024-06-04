<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = [
            'id' => Str::uuid(),
            'user_id' => User::where('id', 'bede1b3f-86cb-4ad8-8671-f00e5f812b6f')->first()->id,
            'name' => 'Kugisaki Nubara',
            'price' => 50000,
            'description' => 'This is anime manga Kugisaki Nubara',
            'stock' => 1,
            'photo_link' => 'https://qggnqvacezpqpklnvybq.supabase.co/storage/v1/object/public/product/Rectangle_104.jpg',
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
            ];

        DB::table('products')->insert($product);
    }
}
