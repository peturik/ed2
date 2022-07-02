
<div class="flex justify-center">
    <div class="w-10/12">
        <h3 class="my-10 text-3xl">Comments</h3>
        <div class="my-4 flex-wrap">
            <div class="w-full py-2 flex flex-nowrap ">
                <input wire:model="author" type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Your name"><br>
                <input wire:model="email" type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="Your email"><br>
            </div>
            <div class="">
                <textarea wire:model="newComment" type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind."></textarea>
            </div>
            <div class="pb-12">
                <button wire:click="addComment" class="w-full p-2 bg-blue-500 w-20 rounded shadow text-white">Add Comment</button>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @foreach($commentUser as $comment)
                <div class="rounded border shadow p-3 my-2">
                    <div class="flex justify-start my-2">
                        <p class="font-bold text-lg">{{ $comment['author'] }}</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">
                            {{
                            $comment['created_at']
                            }}
                        </p>
                    </div>
                    <p class="text-gray-800">{{ $comment['body'] }}</p>
                </div>
        @endforeach

        @if($comments)
            @foreach($comments as $comment)
        <div class="rounded border shadow p-3 my-2">
            <div class="flex justify-start my-2">
                <p class="font-bold text-lg">{{ $comment->author }}</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">
                    {{
                    /*$comment->created_at->toFormattedDateString()*/
                        $comment->created_at->diffForHumans()
                    }}
                </p>
            </div>
            <p class="text-gray-800">{{ $comment->body }} </p>
        </div>
            @endforeach
        @endif

    </div>
</div>
