<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->Validate($request,[ 
            'comment' => 'required|min:5|max:255'
            ]);
        $comment = new Comment();
        $post = Post::all();
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->back();
    }
}
