<?php

namespace App\Http\Controllers\Admin;

use App\Comments;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('status', '=', 1)->get();
        return view('Admin.Post.index', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if ($post) {
            return view('Admin.Post.edit', compact('post'));
        } else {
            return abort(404);
        }
    }

    public function submit(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->title = $request['title'];
            $post->content = $request['content'];
            $post->update();

            return redirect()->route('admin.post')->with('success', 'Post Updated');
        } else {
            return abort(404);
        }
    }

    public function comments($id)
    {
        $comments = Comments::where('post_id', '=', $id)->orderBy('created_at', 'DESC')->get();
        return view('Admin.Post.comments', compact('comments'));
    }

    public function changeStatus($id, $status)
    {
        $comment = Comments::find($id);
        if ($comment) {
            if($status == 'accept') {
                $comment->is_active = 1;
            } else{
                $comment->is_active = -1;
            }
            $comment->update();
            return redirect()->route('admin.post.comments',$comment->post_id);
        }else{
            return abort(404);
        }
    }
}
