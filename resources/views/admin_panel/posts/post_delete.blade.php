@extends('admin_panel.layouts.app')
@section('title', 'Delete/'.$post->slug)

@section('content')
    <div class="container">
        <div class="row justify-content-center">{{--class="row g-5"--}}
            <div class="col-md-8">
                <div class="card">
                    @include('admin_panel.layouts.menu')
                    <h3 class="pb-4 mb-4 mt-4 fst-italic border-bottom text-center">

                        Delete {{ $post->title }}
                    </h3>

                    <article class="blog-post">
                        <h2 class="blog-post-title">
                            <a href="{{ route('post', ['slug' => $post->slug]) }}"> {{ $post->title }}</a>
                        </h2>

                        <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete this post">
                        </form>

                        <p class="blog-post-meta small">Posted on
                            <span>
{{--                                {{ $post->created_at->diffForHumans() }}--}}
                                {{ $post->created_at->toFormattedDateString() }}
                        </span>
                            by {{ $post->user->name }}
                        </p>

                        <p>{!! $post->body !!}</p>
                        <hr>

                    </article>
                    {{--                @livewire('comments')--}}
                </div>

            </div>

{{--            @include('layouts.sidebar')--}}

        </div>
    </div>

@endsection
