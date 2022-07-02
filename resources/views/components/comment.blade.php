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
