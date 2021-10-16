<div>
    <input wire:model="search" class="form-control" type="text" placeholder="Search Posts...">

    @if(!$search == '')
        <ul>
            @foreach($searchPosts as $searchPost)
                <li>
                    <p>
                        <a href="/post/{{ $searchPost->slug }}">{{ $searchPost->title }}</a>

                    </p>
                </li>
            @endforeach
        </ul>
    @endif


</div>
