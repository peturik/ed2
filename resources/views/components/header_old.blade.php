<header class="flex flex-wrap items-center justify-between px-12 h-32 -mb-32 relative
 {{-- border-b-2 --}}
">

    <ul class="order-last md:order-first flex-1 flex justify-center flex-wrap md:justify-start list-reset mainmenu">
    
        <div class="">
                        <a href="/" class="text-3xl no-underline text-grey-darkest hover:text-blue-dark  font-bold  mx-20 ">PetraArt</a><br>
{{--<span class="text-xs text-grey-dark">Beautiful New Tagline</span>--}}
        </div>

        <li>
            <a href="/" class="text-lg text-grey-darker no-underline hover:text-black">Home</a>
        </li>
        <li class="ml-8">
            <a href="/blog" class="text-lg text-grey-darker no-underline hover:text-black">My Works</a>
        </li>
{{--        <li class="ml-8">
            <a href="/about" class="text-lg text-grey-darker no-underline hover:text-black">About</a>
        </li>
        <li class="ml-8">
            <a href="/post/create" class="text-lg text-grey-darker no-underline hover:text-black">Create Post</a>
        </li>--}}
    </ul>



    <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
        @livewire('search')

        @if(\Illuminate\Support\Facades\Auth::user())

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        @else
{{--            <a href="/login" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Login</a>--}}
        @endif
    </div>

</header>
