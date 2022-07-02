<div class="sm:col-span-6 pt-1">
    <label for="image" class="block text-sm font-medium text-gray-700">

        @isset($image)
{{--            Post's image {{ dd($image) }}--}}
            Post's image: {{ $image }}
        @endisset
{{--{{ dd($post) }}--}}
    </label>
    <div class="mt-1 w-1/3">
        @isset($image)
            <img src="{{ $image->temporaryUrl() }}">
            @php
                $postImage = '';
            @endphp
        @endisset

        @isset($postImage)
            <img src="{{ $postImage }}" alt="">
        @endisset

        <input id="image" type="file" wire:model="image" name="image">

        <div wire:loading wire:target="image">Uploading...</div>

        @error('image')
        @php
            $image = false;
        @endphp
        <span
            class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">{{ $message }}
        </span>
        @enderror
    </div>

</div>
