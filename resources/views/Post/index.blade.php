@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p class="font-weight-bold m-0">{{$post->title}}</p>
                            <p class="mb-1">{{\Illuminate\Support\Str::of($post->content)->words(20,'...')}}</p>
                            <a href="{{route('post.details',$post->slug)}}">View</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
