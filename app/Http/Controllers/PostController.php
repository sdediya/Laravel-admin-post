<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $posts = Post::where('status', '=', 1)->get();
        return view('post.index', compact('posts'));
    }

    public function details($slug)
    {

        $post = Post::where(['slug' => $slug])->first();
        if ($post) {
            return view('post.details', compact('post'));
        } else {
            return abort(404);
        }
    }

    public function comments(Request $request, $slug)
    {
        $post = Post::where(['slug' => $slug])->first();
        $user = Auth::user();
        if ($post) {

            $comment = new Comments();
            $comment->post_id = $post->id;
            $comment->user_id = $user->id;
            $comment->content = $request['content'];
            $comment->save();

            return redirect()->route('post.details',$slug)->with('success','Comment has been submitted successfully. waiting for admin approval');
        } else {
            return abort(404);
        }
    }
}
