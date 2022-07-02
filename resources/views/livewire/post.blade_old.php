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
                            @php
                                $dateTime = new DateTime($post->updated_at);
                                $date = $dateTime->format('F d, Y');
                            @endphp
                            {{ $date }}
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
                            <picture class=" mb-5 relative block w-full h-0 pb bg-gray-300 overflow-hidden shadow-lg"
                                     style="padding-top: 75%;">
                                <img class="myLinkModal absolute inset-0 w-full h-full object-cover"
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
                            <img class="myLinkModal md:w-1/4 h-72 flex-grow object-cover"
                                 src="/storage/{{ $image->image }}"/>
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
                
                
                
   {{--             <div class="flex justify-center">
    <div class="w-6/12">
        <h3 class="my-10 text-3xl">Comments</h3>
        <div class="my-4 flex">
            <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind.">
            <div class="py-2">
                <button class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
            </div>
        </div>
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-start my-2">
                <p class="font-bold text-lg">Sarthak</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">3 min ago</p>
            </div>
            <p class="text-gray-800">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at aut corporis cumque deleniti esse ipsam mollitia nihil nisi possimus quidem, recusandae sequi sint sit temporibus ut veniam voluptate voluptates.</p>
        </div>
    </div>
</div>
--}}

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

        </div>

        <x-aside></x-aside>
    </div>
</div>
