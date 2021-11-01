{{--<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="/" class="flex order-first lg:order-none lg:w-1/5 title-font font-bold items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            BLOG
        </a>
        <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
            <a href="/" class="mr-5 hover:text-gray-900">Home</a>
            <a href="/blog" class="mr-5 hover:text-gray-900">Blog</a>
            <a href="/about" class="mr-5 hover:text-gray-900">About</a>
            <a href="/post/create" class="mr-5 hover:text-gray-900">Create Post</a>
        </nav>


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
            <a href="/login" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Login</a>
            @endif
        </div>
    </div>
</div>--}}



<header class="flex flex-wrap items-center justify-between px-12 h-32 -mb-32 relative">

    <ul class="order-last md:order-first flex-1 flex justify-center md:justify-start list-reset mainmenu">
        <li>
            <a href="/" class="text-lg text-grey-darker no-underline hover:text-black">Home</a>
        </li>
        <li class="ml-8">
            <a href="/blog" class="text-lg text-grey-darker no-underline hover:text-black">Blog</a>
        </li>
        <li class="ml-8">
            <a href="/about" class="text-lg text-grey-darker no-underline hover:text-black">About</a>
        </li>
        <li class="ml-8">
            <a href="/post/create" class="text-lg text-grey-darker no-underline hover:text-black">Create Post</a>
        </li>
    </ul>

{{--    <div class="w-full md:w-auto flex justify-center">--}}
{{--        <a href="#" class="block text-center text-black text-lg no-underline">--}}

{{--        </a>--}}
{{--    </div>--}}

{{--    <ul class="flex-1 flex justify-center md:justify-end list-reset">--}}
{{--        <li class="ml-8 hidden md:inline">--}}
{{--            <a href="#" class="text-sm font-bold px-4 py-3 no-underline text-white bg-black hover:bg-gray-800">Subscribe now</a>--}}
{{--        </li>--}}
{{--    </ul>--}}

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
            <a href="/login" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Login</a>
        @endif
    </div>

</header>
