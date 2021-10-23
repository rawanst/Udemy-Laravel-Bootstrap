<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($postId, CommentStoreRequest $request)
    {
        $param = $request->validated();
        $param['post'] = $postId;
        Comment::create($param);
        return back();
    }

    public function deleteComment ($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
