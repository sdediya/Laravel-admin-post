@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-2">
                    <div class="card-body">
                        <form action="{{route('admin.post.submit', $post->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="content">{{$post->content}}</textarea>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
