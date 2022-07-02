@if($categories->count())
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('category', ['slug' => $category->slug]) }}" class="text-blue-500 hover:underline">{{ $category->title }}</a>
            </li>
        @endforeach
    </ul>
@endif
