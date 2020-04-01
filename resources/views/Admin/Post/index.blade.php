@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mb-2">
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="30">Title</th>
                                <th width="30">Content</th>
                                <th width="30">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{\Illuminate\Support\Str::of($post->content)->words(20,'...')}}</td>
                                    <td>
                                        <a href="{{route('admin.post.edit',$post->id)}}">Edit</a> |
                                        <a href="{{route('admin.post.comments',$post->id)}}">
                                            Comments (new {{$post->comments()->where('is_active','=',0)->count()}})
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
