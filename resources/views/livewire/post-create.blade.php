@section('title', "Create")
<div class="md:my-8 my-0 mx-auto max-w-screen-lg bg-white border-gray-400 py-20">
    <div class="flex py-12 md:px-20">
        <div class="flex-grow grid grid-cols-1 gap-8 mx-2 md:mr-20 divide-y">

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
                                <p>
                                    <script>alert('Your new post has been saved.')</script>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <article>
                @csrf
                @if($post->slug)
                    <header>
                        <h1 class="pr-20 pb-4">
                            <a href="/post/{{ $post->slug }}"
                               class="text-2xl font-semibold hover:text-blue-500">{{ $post->title }}</a>
                        </h1>
                        <div class="text-xs text-gray-600">
                            <span class="">Posted on </span>
                            <time datetime="{{ $post->updated_at }}"
                                  class="text-blue-500 font-semibold hover:underline">
                                @php
                                    $dateTime = new DateTime($post->updated_at);
                                    $date = $dateTime->format('F d, Y');
                                @endphp
                                {{ $date }}
                            </time>
                        </div>
                    </header>
                @else
                    <header><h1 class="pr-20 pb-4 text-2xl font-semibold hover:text-blue-500">Create new Post</h1>
                    </header>
                @endif

                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Post Title {{ $post->title }}
                    </label>
                    <div class="mt-1">
                        <input id="title"
                               wire:model="post.title"
                               name="title"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class="sm:col-span-6 mt-1">
                    <label for="category" class="block text-sm font-medium text-gray-700">
                        Category {{ $category }}
                    </label>
                    <div class="mt-1" wire:model="category">
                        <select required name="category" id="category"
                                class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option disabled selected label="{{ $post->category->title ?? null }}">Select a Category
                            </option>
                            @if(count($categories))
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>


                <div class="sm:col-span-6 pt-5">
                    <label for="image" class="block text-sm font-medium text-gray-700">
                        Post's image {{ $this->image }}
                    </label>
                    <div class="mt-1 w-1/3">
                        @if ($image)
                            image Preview:
                            <img src="{{ $image->temporaryUrl() }}">
                            {{--                            {{ $image }}--}}
                        @elseif($post->image)
                            image Preview:
                            <img src="/storage/{{ $post->image }}">
                            {{ $post->image }}
                        @endif
                        <input type="file" wire:model="image" name="image">


                        @error('image')
                        @php
                            $this->image = false;
                        @endphp
                        <span
                            class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}
                        </span>
                        @enderror


                    </div>

                </div>


                <div class="sm:col-span-6 pt-5">

                    <div>
                        <div>
                            <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                            <livewire:trix :value="$body">
                        </div>

                    </div>

                    <div class="sm:col-span-6">
                        <label for="images" class="block text-sm font-medium text-gray-700">
                            Gallery
                        </label>
                        <div class="mt-1 mb-4 flex  flex-wrap">
                            @if($images)
                                @foreach($images as $item)
                                    <div wire:key="{{$loop->index}}">
                                        <img src="{{ $item->temporaryUrl()}}" class="flex-grow w-40 m-1.5"
                                             alt="Image">
                                        <button wire:click="removeMe({{$loop->index}})" class="close">Remove
                                        </button>
                                    </div>
                                @endforeach
                            @endif


                            @if($postGallery)
                                @foreach($postGallery as $gal)
                                    <div wire:key="{{$loop->index}}">
                                        <img src="/storage/{{ $gal->image }}" class="flex-grow w-40 m-1.5"
                                             alt="Image">
                                        <button wire:click="removeG({{$loop->index}})" class="close">Remove</button>
                                    </div>
                                @endforeach
                            @endif


                            <input type="file" id="images"
                                   wire:model="images"
                                   name="images"
                                   multiple
                                   class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">


                        </div>
                    </div>

                    <div wire:click="savePost"
                         class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">
                        Submit Post
                    </div>

                    @if($saveSuccess)
                        <div class="rounded-md bg-green-100 rounded-lg p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
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


                    <footer class="text-xs text-gray-600">
                        <span>Posted in</span>
                        <a href="#" rel="category"
                           class="text-blue-500 font-semibold hover:underline">Uncategorized</a>
                        <span> | </span>
                        <span>Tagged</span>
                        <a href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">boat</a>, <a
                            href="#" rel="tag" class="text-blue-500 font-semibold hover:underline">lake</a>
                    </footer>
                </div>
            </article>

        </div>


    </div>
</div>
