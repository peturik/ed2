@extends('admin_panel.layouts.app')
@section('title', 'Delete Comment')

@section('content')
    <div class="container">
        <div class="row justify-content-center">{{--class="row g-5"--}}
            <div class="col-md-8">
                <div class="card">
                    @include('admin_panel.layouts.menu')
                    <h3 class="pb-4 mb-4 mt-4 fst-italic border-bottom text-center">

                        Delete {{ $comment->post->title }}
                    </h3>

                    <article class="blog-post">

                        <div class="rounded border shadow p-3 my-2">
                            <div class="flex justify-start my-2">
                                <p class="font-bold text-lg">{{ $comment->author }}</p>

                                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">
                                    {{ $comment->created_at->diffForHumans() }}   {{-- toFormattedDateString()--}}
                                </p>
                            </div>
                            <p class="text-gray-800">Post: <span class="font-bold text-lg"> {{ $comment->post->title }}</span></p>

                            <p class="text-gray-800">{{ $comment->body }} </p>
                        </div>

                        <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete this comment">
                        </form>


                        <hr>

                    </article>
                    {{--                @livewire('comments')--}}
                </div>

            </div>

            {{--            @include('layouts.sidebar')--}}

        </div>
    </div>

@endsection
