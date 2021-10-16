<div class="md:my-8 my-0 mx-auto max-w-screen-lg bg-white border-gray-400 py-20">
    <div class="flex py-12 px-20">
        <div class="flex-grow grid grid-cols-1 gap-8 mr-20 divide-y">

            @if($saveSuccess)
                <div class="rounded-md bg-green-100 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Successfully Saved Post</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Your new post has been saved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <article>
                <header>
                    <h1 class="pr-20 pb-4">
                        <a href="/post/{{ $post->slug }}"
                           class="text-2xl font-semibold hover:text-blue-500">{{ $post->title }}</a>
                    </h1>
                    <div class="text-xs text-gray-600">
                        <span class="">Posted on </span>
                        <a href="#" title="4:33 am" rel="bookmark"
                           class="text-blue-500 font-semibold hover:underline">
                            <time datetime="2008-10-17T04:33:51+00:00">October 17, 2008</time>
                        </a>
                    </div>
                </header>

                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Post Title
                    </label>
                    <div class="mt-1">
                        {{--                    {{dd( $post->title )}}--}}
                        <input id="title" wire:model="post.title" name="title"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <form action="{{ route('img-resize') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="file" name="imgFile" class="imgFile">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

                <div class="sm:col-span-6 pt-5">
                    <label for="image" class="block text-sm font-medium text-gray-700">
                        Post's image
                    </label>
                    <div class="mt-1">
                        @if ($image)
                            image Preview:
                            <img src="{{ $image->temporaryUrl() }}">
{{--                            {{ $image }}--}}
                        @elseif($post->image)
                            image Preview:
                            <img src="/storage/{{ $post->image }}">
{{--                            {{ $post->image }}--}}
                        @endif
{{--                        <input type="file" wire:model="image" name="image">--}}
{{--                            <button wire:click="imgResize">+</button>--}}


                        @error('image')
                            @php
                                $this->image = false;
                            @endphp
                            <span class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}</span>
                        @enderror


                    </div>

                </div>


                <div class="sm:col-span-6 pt-5">
                    <label for="editor" class="block text-sm font-medium text-gray-700">Body</label>
                    <div class="mt-1">
                <textarea id="editor" rows="10" wire:model="post.body"
                          class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
                </div>
                <div wire:click="savePost"
                     class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">
                    Submit Post
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


    </div>
</div>
