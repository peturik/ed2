@extends('layouts.main')
@section('title', 'Blog')
@section('content')
{{--    {{ dd($category) }}--}}
<div class="flex flex-row mt-20 py-14 px-20 text-center">
    <div class="flex-grow">
        @if(isset($category->title))
            <h1 class="text-3xl font-semibold">{{ $category->title }}</h1>
        @else
            <h1 class="text-3xl font-semibold italic">This is my works</h1>
        @endif
        <h2 class="text-sm text-gray-500"></h2>
    </div>
</div>

<div id="blog" class="md:my-8 my-0 mx-auto max-w-screen-lg bg-white border-gray-400 ">{{--py-20--}}
    <div class="flex flex-wrap md:flex-nowrap pb-12 px-10">
        <div class="flex-grow grid grid-cols-1 gap-8 md:mr-20 divide-y">
            <article>
                @if($posts)
                    @foreach($posts as $post)
                        <div class="grid md:grid-cols-9 md:items-center w-full max-w-screen-sm md:max-w-screen-md mx-auto px-4 m-5">
                            <div
                                class="col-span-12 md:col-span-auto md:col-start-1 md:col-end-9 md:row-start-1 md:row-end-1 bg-red-500">
                                <a class="" href="/post/{{ $post->slug }}" title="{{ $post->title }}">
                                    <picture class="relative block w-full h-0 pb bg-white overflow-hidden shadow-lg"{{-- bg-gray-300 --}}
                                             style="padding-top: 75%;">
                                        <img class="absolute inset-0 m-auto h-full object-cover"{{-- w-full --}}
                                             src="{{ asset('/storage/' . $post->image) }}"
                                             alt=" A random image from Unsplash">
                                    </picture>
                                </a>
                            </div>
                            <div class="col-span-12 md:col-span-auto md:col-start-7 md:col-end-13 md:row-start-1 md:row-end-1 -mt-8 md:mt-0 relative z-10 px-4 md:px-0">
                                <div class="p-4 md:p-8 bg-white shadow-lg">
                                    <p class="mb-2 text-lg leading-none font-medium">
                                        <a class="" href="/post/{{ $post->slug }}" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </a>
                                    </p>
                                    <p class="mb-2 text-sm text-gray-700">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($post->body, ['a', 'p', 'br'])) !!}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        Published
                                        <time datetime="{{ $post->updated_at }}" class="text-blue-500 font-semibold hover:underline">
                     {{--                       @php
                                                $dateTime = new DateTime($post->updated_at);
                                                $date = $dateTime->format('F d, Y');
                                            @endphp
                                            {{ $date }}  --}}


{{ $post->created_at->toFormattedDateString() }}  
{{--
{{ $post->updated_at->diffForHumans() }}--}}
                                        </time><br>
                                        Category
                                        <a href="{{ route('category', $post->category->slug) }}" class="text-blue-500 font-semibold hover:underline" >{{ ($post->category->title) }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </article>
{{ $posts->links() }}

        </div>
<!-- <div class=""> -->
<x-aside></x-aside>
<!-- </div> -->
        

    </div>
</div>
@endsection
