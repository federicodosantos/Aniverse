<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscussionRequest;
use App\Models\Discussion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DiscussionController extends Controller
{
    public function index() {
        return view('discuss.index');
    }

    public function create(Request $request) {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $discussion = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        Discussion::create($discussion);

        return redirect('/discuss');
    }

    public function update($id, Request $request) {
        $discussion = Discussion::where('id', $id)->first();

        if (!$discussion) {
            return response()->json(['message' => 'Discussion not found'], 404);
        }

        if ($request->title) {
            $discussion->title = $request->title;
        }

        if ($request->description) {
            $discussion->description = $request->description;
        }

        $discussion->save();

        return redirect('/discuss')->with('success', 'Discussion updated successfully');
    }

    public function delete($id) {
        $discussion = Discussion::where('id', $id)->first();

        if (!$discussion) {
            return response()->json(['message' => 'Discussion not found'], 404);
        }

        $discussion->delete();

        return redirect('/discuss')->with('success', 'Discussion deleted successfully');
    }

    public function showAll() {
        $discussions = Discussion::all()->sortByDesc('created_at');

        return view('discuss.index', ['discussions' => $discussions]);
    }

    public function showDetail($id) {
        $discussion = Discussion::with('user', 'comments')->where('id', $id)->first();

        if (!$discussion) {
            return response()->json(['message' => 'Discussion not found'], 404);
        }

        Log::info('discussion', [$discussion]);

        return view('discuss.show', ['discuss' => $discussion]);
    }

    public function createForm()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('discuss.create');
    }
}
