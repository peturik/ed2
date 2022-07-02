@extends('admin_panel.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header"><h2>Welcome, {{ Auth::user()->name }}!</h2></div>--}}

                    @include('admin_panel.layouts.menu')

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(count($comments) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Post Title</th>
                                    <th>Email</th>
                                    <th>Content</th>
{{--                                    <th>Update</th>--}}
{{--                                    <th>Delete</th>--}}
                                    <th colspan ="2">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->post->title }}</td>
{{--                                        <td><a href="{{ route('post', ['slug' => $post->slug]) }}">{{ $comment->post->title }}</a></td>--}}
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->body }}</td>
{{--                                        <td><a href="{{ route('post.edit', ['post' => $comment->id]) }}">Update</a></td>--}}
                                        <td><a href="{{ route('comment.delete', ['comment' => $comment->id]) }}">Delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
