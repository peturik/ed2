@section('title', $post->title)

<div class="flex flex-row mt-20 py-14 px-20 text-center">
    <div class="flex-grow">
        <h1 class="text-3xl font-semibold">{{ $post->title }}</h1>
    </div>
</div>

<div id="blog" class="md:my-8 my-0 mx-auto max-w-screen-lg bg-white border-gray-400 ">{{--py-20--}}
    <div class="flex flex-wrap md:flex-nowrap pb-12 px-14">
        <div class="flex-grow grid grid-cols-1 gap-8 md:mr-20 divide-y">

            <article>
                <header>
                    <div class="text-xs text-gray-600">
                        <span class="">Posted on </span>
                        <time datetime="{{ $post->updated_at }}" class="text-blue-500 font-semibold hover:underline">
             {{--               @php
                                $dateTime = new DateTime($post->updated_at);
                                $date = $dateTime->format('F d, Y');
                            @endphp
                            {{ $date }}--}}


{{ $post->created_at->toFormattedDateString() }}
                        </time>
                        <br>
                        @auth
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                <a href="{{ url()->current() }}/update"
                                   class="text-blue-500 font-semibold hover:underline">Update this post</a>
                            @endif
                        @endauth

                    </div>
                </header>
                <div class="py-8">
                    <div
                        class="col-span-12 md:col-span-auto md:col-start-1 md:col-end-9 md:row-start-1 md:row-end-1 bg-red-500">
                        {{--                        <a class="" href="/post/{{ $post->slug }}" title="{{ $post->title }}">--}}
                        <a href="{{ route('post', ['slug' => $post->slug]) }}" title="{{ $post->image }}">
                            <picture class=" mb-5 relative block w-full h-0 pb bg-white overflow-hidden shadow-lg"
                                     style="padding-top: 75%;">
                                <img class="myLinkModal absolute inset-0 m-auto h-full object-cover"
                                     src="{{ asset('/storage/' . $post->image) }}" alt=" A random image from Unsplash">
                            </picture>
                        </a>
                    </div>
                    <p>{!! $post->body !!} </p>
                </div>

                {{--gallery--}}
                @if (count($images))
                    <div class="gallery  py-20 flex flex-wrap gap-4 md:w-4/5 mx-auto">  {{-- w-4/5 --}}
                        @foreach($images as $k => $image)
                            <img class="myLinkModal md:w-1/4 h-full flex-grow object-cover"
                                 src="/storage/{{ $image->image }}"/>{{--h-72--}}
                        @endforeach
                    </div>
                @endif

                <div id="myModal" class="">
                    <img class="modal-content" src="">
                    <button class="prev bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-12">
                        Prev
                    </button>
                    <button class="next bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-12 rounded-r">
                        Next
                    </button>

                    <span id="myModal__close" class="close">×</span>

                </div>
                <div id="myOverlay"></div>

                {{--endgallery--}}



                <footer class="text-xs text-gray-600">
                    <span>Posted in</span>
                    <a href="{{ route('category', $post->category->slug) }}" rel="category"
                       class="text-blue-500 font-semibold hover:underline">{{ $post->category->title }}</a>
                    {{--<span> | </span>
                    <span>Tagged</span>
                    <a href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">boat</a>, <a
                        href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">lake</a>--}}
                </footer>
            </article>
            {{--                @livewire('comment')--}}
            <livewire:comment />
        </div>


        <x-aside></x-aside>
    </div>
</div>
