<div class="md:my-8 my-0 mx-auto max-w-screen-lg bg-white border-gray-400 py-20">
    <div class="flex py-12 px-20">
        <div class="flex-grow grid grid-cols-1 gap-8 mr-20 divide-y">

                    <article>
                        <header>
                            <h1 class="pr-20 pb-4">
                                <a href="/post/{{ $post->slug }}"
                                   class="text-2xl font-semibold hover:text-blue-500">{{ $post->title }}</a>
                            </h1>
                            <div class="text-xs text-gray-600">
                                <span class="">Posted on </span>
                                <time datetime="{{ $post->updated_at }}"  class="text-blue-500 font-semibold hover:underline">
                                    @php
                                        $dateTime = new DateTime($post->updated_at);
                                        $date = $dateTime->format('F d, Y');
                                    @endphp
                                    {{ $date }}
                                </time>
                            </div>
                            <a href="{{ url()->current() }}/update">Update this post</a>
                        </header>
                        <div class="py-8">
                            <div
                                class="col-span-12 md:col-span-auto md:col-start-1 md:col-end-9 md:row-start-1 md:row-end-1 bg-red-500">
                                <a class="" href="/post/{{ $post->slug }}" title="{{ $post->title }}">
                                    <picture class=" mb-5 relative block w-full h-0 pb bg-gray-300 overflow-hidden shadow-lg"
                                             style="padding-top: 75%;">
                                        {{--                            <img class="absolute inset-0 w-full h-full object-cover" src="img/1.jpg" alt="A random image from Unsplash">--}}
                                        <img class="absolute inset-0 w-full h-full object-cover"
                                             src="{{ asset('/storage/' . $post->image) }}" alt=" A random image from Unsplash">
                                    </picture>
                                </a>
                            </div>
                            <p>{{ $post->body }}</p>
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

        </div>

        <x-aside></x-aside>

    </div>
</div>
{{--
<div class="container mx-auto p-5">
    <div class="mt-10 max-w-xl mx-auto">
        <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">{{ $post->title }}</h1>
        <div class="border-b mb-5 pb-5 border-gray-200">
            <a href="/post/{{ $post->slug }}" class="text-2xl font-bold mb-2">{{ $post->title }}</a>
            <p>{{ \Illuminate\Support\Str::limit($post->body) }}</p>
        </div>

    </div>
</div>
--}}
