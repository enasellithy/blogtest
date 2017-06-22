<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Post;
use App\Model\Comment;
use Auth;
use Session;
use Redirect;

class AdminController extends Controller
{
    // Adminpanel
    public function index()
    {
        $users = User::where('admin',0)->get();
        $posts = Post::get();
        $comment = Comment::get();
        return view('admin.index',compact('users','posts','comment'));
    }

    // Get Post In Adminpanel
    public function getPostIndex()
    {
        $posts = Post::with('comment')->orderBy('created_at','desc')->paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    // Get Comment In Adminpanel
    public function getCommentIndex()
    {
        $comments = Comment::orderBy('created_at','desc')->paginate(1);
        return view('admin.comment.index',compact('comments'));
    }

    // Edit Comment By Admin
    public function editComment($id)
    {
        $comments = Comment::find($id);
        return view('admin.comment.edit')->withComments($comments);
    }

    // Update Comment By Admin
    public function updateComment(Request $request, $id)
    {
        $this->Validate($request,[ 
            'comment' => 'required|min:5|max:255'
            ]);
        $comments = Comment::find($id);
        $comments->comment = $request->comment;
        $comments->post_id = $request->post_id;
        $comments->save();
        Session::flash('success','Comment Update');
        return redirect()->back();
    }

    // Delete Comment By Admin
    public function deleteComment($id)
    {
        $comments = Comment::find($id);
        $comments->delete();
        Session::flash('success','Comment Delete');
        return redirect()->back();
    }
}
