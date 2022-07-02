@extends('admin_panel.layouts.app')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                <div class="card-header"><h2>Welcome, {{ Auth::user()->name }}!</h2></div>--}}
                    @include('admin_panel.layouts.menu')


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        @if(count($posts) > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Posts</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td><h3>
                                                <a href="{{ route('post', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                            </h3></td>
                                        <td>{!! $post->body !!}</td>
                                        <td>{{ $post->category->title }}</td>
                                        <td><a href="{{ route('post.edit', ['post' => $post->id]) }}">Update</a></td>
                                        <td><a href="{{ route('post.delete', ['post' => $post->id]) }}">Delete</a></td>
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
