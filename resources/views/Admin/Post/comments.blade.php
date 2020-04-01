@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card mb-2">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="m-0">Comments</h5>
                        <a href="{{route('admin.post')}}">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="60%">Comment</th>
                                <th width="20%">Time</th>
                                <th width="20%">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->content}}</td>
                                    <td>{{$comment->created_at}}</td>
                                    <td>
                                        @if ($comment->is_active == 0)
                                            <a href="{{route('admin.post.change_comment_status',[$comment->id,'accept'])}}"
                                               class="btn btn-success"><i class="fas fa-check"></i></a>
                                            <a href="{{route('admin.post.change_comment_status',[$comment->id,'reject'])}}"
                                               class="btn btn-danger"><i class="fas fa-times"></i></a>
                                        @elseif($comment->is_active == 1)
                                            Accepted
                                        @else
                                            Rejected
                                        @endif
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
