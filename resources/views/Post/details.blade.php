@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->content}}</p>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <p class="m-0 font-weight-bold">Comments</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($post->comments()->where('is_active','=','1')->get() as $comment)
                                <div class="col-md-12 border-bottom">
                                    <p class="m-0 mt-3">
                                        <b>{{$comment->user()->first()->name}}</b><br>({{date('Y-m-d H:s:i', strtotime($comment->created_at))}}
                                        )</p>
                                    <p>{{$comment->content}}</p>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{route('post.comment', $post->slug)}}" method="post">
                            @csrf
                            <div class="row align-items-center mt-3">
                                <div class="col-md-9">
                                    <label>Enter your comment</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
