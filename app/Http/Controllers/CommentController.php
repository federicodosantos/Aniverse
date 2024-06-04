<?php

namespace App\Http\Controllers;

use App\Models\DiscussionComment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $comment = [
            'discussion_id' => $request->discussion_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ];

        DiscussionComment::create($comment);

        return redirect('/discuss/' . $request->discussion_id);
    }
}
