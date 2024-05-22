<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ItemsController extends Controller
{
    public function showAllAnime() {
        $animeItems = Item::whereHas('categoryItems', function ($query) {
            $query->where('category_id', 1);
        })->orderBy('title', 'desc')
        ->get();

        return response()->json($animeItems);
    }

    public function showAllManga() {
        $mangaItems = Item::whereHas('categoryItems', function ($query) {
            $query->where('category_id', 2);
        })->orderBy('title', 'desc')
        ->get();

        return response()->json($mangaItems);
    }

    public function getHotAnime() {
        $hotAnime = Item::whereHas('characterItem', function ($query) {
            $query->where('category_id', 1);
        })
        ->orderBy('rating', 'desc')
        ->take(6)
        ->get();

        Log::info('value : ' ,[response()->json($hotAnime)]);
        return response()->json($hotAnime);
    }

    public function showDetail(int $id) {
        $item = Item::with('characterItem')->findOrFail($id);
        Log::info('value : ', [$item]);

        return view('item.detail', compact('item'));
    }
}
