<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ItemsController extends Controller
{
    public function showAllAnime() {
        $animeItems = Item::whereHas('categoryItem', function ($query) {
            $query->where('category_id', 1);
        })->orderBy('title', 'desc')
        ->get();

        return response()->json($animeItems);
    }

    public function showPageAnimes() {
        return view('anime_list');
    }

    public function showAllManga() {
        $mangaItems = Item::whereHas('categoryItem', function ($query) {
            $query->where('category_id', 2);
        })->orderBy('title', 'desc')
        ->get();

        return response()->json($mangaItems);
    }

    public function showPagemangas() {
        return view('manga_list');
    }

    public function getHotAnime() {
        $hotAnime = Item::whereHas('characterItem', function ($query) {
            $query->where('category_id', 1);
        })
        ->orderBy('rating', 'desc')
        ->take(6)
        ->get();

        return response()->json($hotAnime);
    }

    public function getHotManga()
    {
        $hotManga = Item::whereHas('characterItem', function ($query) {
            $query->where('category_id', 2);
        })->orderBy('rating', 'desc')
            ->take(6)
            ->get();

        return response()->json($hotManga);
    }

    public function showDetail(int $id) {
        $item = Item::with('characterItem')->findOrFail($id);

        return view('anime_describe', compact('item'));
    }
}
