<div class="flex flex-row mt-20 py-14 px-20 text-center">
    <div class="flex-grow">
        <h1 class="text-3xl font-semibold">Twenty Eleven</h1>
        <h2 class="text-sm text-gray-500">The 2011 theme is sophisticated, lightweight, and adaptable.</h2>
    </div>
</div>
{{--<a href="#">
    <img src="https://wp-themes.com/wp-content/themes/twentyeleven/images/headers/pine-cone.jpg" alt="Twenty Eleven"
         class="w-full">
</a>--}}


<div class="md:my-8 my-0 mx-auto max-w-screen-lg bg-white border-gray-400 py-20">
    <div class="flex py-12 px-20">
        <div class="flex-grow grid grid-cols-1 gap-8 mr-20 divide-y">


            @if($posts)
                @foreach($posts as $post)
                    <div
                        class="grid grid-cols-12 md:items-center w-full max-w-screen-sm md:max-w-screen-md mx-auto px-4 m-5">
                        <div
                            class="col-span-12 md:col-span-auto md:col-start-1 md:col-end-9 md:row-start-1 md:row-end-1 bg-red-500">
                            <a class="" href="/post/{{ $post->slug }}" title="{{ $post->title }}">
                                <picture class="relative block w-full h-0 pb bg-gray-300 overflow-hidden shadow-lg"
                                         style="padding-top: 75%;">
                                    {{--                            <img class="absolute inset-0 w-full h-full object-cover" src="img/1.jpg" alt="A random image from Unsplash">--}}
                                    <img class="absolute inset-0 w-full h-full object-cover"
                                         src="{{ asset('/storage/' . $post->image) }}" alt=" A random image from Unsplash">
                                </picture>
                            </a>
                        </div>
                        <div
                            class="col-span-12 md:col-span-auto md:col-start-7 md:col-end-13 md:row-start-1 md:row-end-1 -mt-8 md:mt-0 relative z-10 px-4 md:px-0">
                            <div class="p-4 md:p-8 bg-white shadow-lg">
                                <p class="mb-2 text-lg leading-none font-medium">
                                    <a class="" href="/post/{{ $post->slug }}" title="{{ $post->title }}">
                                        {{ $post->title }}
                                    </a>
                                </p>
                                <p class="mb-2 text-sm text-gray-700">
                                    {{ \Illuminate\Support\Str::limit($post->body) }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Published
                                    <time datetime="{{ $post->updated_at }}"  class="text-blue-500 font-semibold hover:underline">
                                        @php
                                            $dateTime = new DateTime($post->updated_at);
                                            $date = $dateTime->format('F d, Y');
                                        @endphp
                                        {{ $date }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            {{--@if($posts)
                @foreach($posts as $post)
                    <article>
                        <header>
                            <h1 class="pr-20 pb-4">
                                <a href="
"
                                   class="text-2xl font-semibold hover:text-blue-500">{{ $post->title }}</a>
                            </h1>
                            <div class="text-xs text-gray-600">
                                <span class="">Posted on </span>
                                <a class="text-blue-500 font-semibold hover:underline">
                                    @php
                                        $dateTime = new DateTime($post->updated_at);
                                        $date = $dateTime->format('F d, Y');
                                    @endphp
                                    <time datetime="{{ $post->updated_at }}">{{ $date }}</time>
                                </a>
                            </div>
                        </header>

                        <div class="py-8">
                            @if($post->image)
                                <div class="p-4 mb-6 w-max bg-gray-200">
                                    <img loading="lazy" class="wp-image-59" alt="Boat"
                                         --}}{{--                                     src="https://wpdotorg.files.wordpress.com/2008/11/boat.jpg" width="435" height="288">--}}{{--
                                         src="{{ asset('/storage/' . $post->image) }}" width="435" height="288">
                                    <p class="pt-4 pb-2 text-sm text-gray-600 font-serif">&mdash; Boat</p>
                                </div>
                            @endif
                            <p>{{ \Illuminate\Support\Str::limit($post->body) }}</p>
                        </div>


                        <footer class="text-xs text-gray-600">
                            <span>Posted in</span>
                            <a href="#" rel="category"
                               class="text-blue-500 font-semibold hover:underline">Uncategorized</a>
                            <span> | </span>
                            <span>Tagged</span>
                            <a href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">boat</a>, <a
                                href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">lake</a>
                        </footer>
                    </article>
                @endforeach
            @endif--}}
            {{--
                        <article>
                            <header>
                                <h1 class="pr-20 pb-4 mt-12">
                                    <a href="#" class="text-2xl font-semibold hover:text-blue-500">Tailwind is gud</a>
                                </h1>
                                <div class="text-xs text-gray-600">
                                    <span class="">Posted on </span>
                                    <a href="#" title="4:33 am" rel="bookmark" class="text-blue-500 font-semibold hover:underline">
                                        <time datetime="2008-09-05T19:39:12+00:00">September 5, 2008</time>
                                    </a>
                                </div>
                            </header>
                            <div class="py-8">
                                <p>
                                    <a href="https://tailwindcss.com/" class="text-blue-500 hover:underline">download</a> le tailwind.
                                    its da best in da world.
                                    the <a href="https://wordpress.org/themes/twentyeleven/" class="text-blue-500 hover:underline">theme</a> original.
                                </p>
                            </div>
                            <footer class="text-xs text-gray-600">
                                <span>Posted in</span>
                                <a href="#" rel="category" class="text-blue-500 font-semibold hover:underline">Uncategorized</a>
                            </footer>
                        </article>
                        <article>
                            <header>
                                <h1 class="pr-20 pb-4 mt-12">
                                    <a href="#" class="text-2xl font-semibold hover:text-blue-500">More Tags</a>
                                </h1>
                                <div class="text-xs text-gray-600">
                                    <span class="">Posted on </span>
                                    <a href="#" title="4:33 am" rel="bookmark" class="text-blue-500 font-semibold hover:underline">
                                        <time datetime="2008-06-21T00:09:24+00:00">June 21, 2008</time>
                                    </a>
                                </div>
                            </header>
                            <div class="py-8">
                                <p>
                                    More of these posts need tags.
                                </p>
                            </div>
                            <footer class="text-xs text-gray-600">
                                <span>Posted in</span>
                                <a href="#" rel="category" class="text-blue-500 font-semibold hover:underline">Uncategorized</a>
                                <span> | </span>
                                <span>Tagged</span>
                                <a href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">Tailwind</a>
                            </footer>
                        </article>
            --}}

        </div>

        <x-aside></x-aside>

    </div>
</div>
