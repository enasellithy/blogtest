<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Auth;
use App\Model\Post;
use Session;
//use Intervention\Image\ImageManagerStatic as Image;
use Redirect;
use App\Model\Comment;
use App\Model\Subscrib;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Response;

class PostController extends Controller
{
    // Get Posts In Front Page
    public function index()
    {
        $posts = Post::with('comment')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('welcome',compact('posts'));
    }

    // Create Post
    public function create()
    {
        return view('website.post.create');
    }

    // Save Post
    public function store(Request $request)
    {
        $this->Validate($request,[ 
            'title' => 'required|string|min:5|max:200',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'body' => 'required|string|min:15',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'send' => ''
            ]);
        $posts = new Post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->slug = $request->slug;
        $posts->user_id = Auth::user()->id;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $img_name = time() . '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/post/'),$img_name);
            $posts->image = $img_name;
        }
        $posts->send = $request->send;
        $posts->save();
        if($posts->send == 1)
        {
            $sub = Subscrib::all();
            Notification::send($sub, new \App\Notifications\NewPost($posts));
        }
        Session::flash('success','Post Add');
        return Redirect::route('home');
    }

    // Show Post In Front
    public function show($id)
    {
        $comment = Comment::all();
        $posts = Post::find($id);
        return view('website.post.show',compact('comments'))->withPosts($posts);
    }

    // Edit Post
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('website.post.edit')->withPosts($posts);
    }

    // Update Post
    public function update(Request $request, $id)
    {
        $this->Validate($request,[ 
            'title' => 'required|string|min:5|max:200',
            'image' => 'mimes:jpeg,bmp,png,jpg',
            'body' => 'required|string|min:15',
            'slug' => 'alpha_dash|min:5|max:255',
            ]);
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->slug = $request->slug;
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $img_name = time() . '.' .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/post/'),$img_name);
            $posts->image = $img_name;
        }
        $posts->user_id = Auth::id();
        Session::flash('success','Post Update');
        return Redirect::route('home');
    }

    // Delete Post
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post->delete())
        {
            // Delete Comments Belong To Post
            $post->comment()->delete();
            Session::flash('success','Posts Deleted');
            return redirect()->back();

        }
    }

    // Get Single By Slug Belongs To Post
    public function getSingle($slug)
    {
        $posts = Post::where('slug','=', $slug)->first();
    }

    public function saveSub(Request $request)
    {
        $this->Validate($request,[ 
            'mobile' => 'required|numeric|unique:subscribs,mobile'
            ]);
        Subscrib::create($request->all());
        Session::flash('success','Done');
        return redirect()->back();
    }
}
