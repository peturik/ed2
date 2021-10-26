@extends('layouts.main')

@section('content')

<div class="w-full flex flex-wrap md:h-screen pt-32">
    <div class="pt-6 md:pt-0 w-full md:flex-1 md:order-last">
        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=1400" class="w-full h-64 md:h-full object-cover" />
    </div>
    <div class="w-full p-6 pb-12 md:p-12 md:w-5/12 flex justify-center items-center relative">
        <div class="w-full relative text-center py-12 px-12 md:p-0 md:text-right">
            <h1 class="text-5xl mb-4">Mobilise Wrist</h1>
            <h2 class="text-2xl mb-4">Ut vel nunc a est auctor lacinia.</h2>
            <p class="leading-loose tracking-wide text-gray-700">Curabitur convallis aliquet dignissim. Nulla at risus feugiat, egestas lacus at, pharetra risus. Aliquam vitae semper leo, quis ornare massa. Aenean dignissim facilisis imperdiet.</p>
        </div>
    </div>
</div>

<div class="w-full -mt-6 pt-32 pb-24 px-12 text-center bg-black text-white">
    <h2 class="text-4xl mb-6">Subscribe to join us</h2>
    <p class="font-sans text-sm mx-auto max-w-xl leading-loose mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    <p class="font-sans text-sm mx-auto max-w-xl leading-loose">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore. </p>

    <form action="" method="POST">

        <div class="pt-10 mb-6 flex justify-center items-end text-left">

            <div class="p-4">
                <input type="text" name="" placeholder="First name" class="font-sans text-sm px-2 h-10 bg-transparent border-b-2" />
            </div>

            <div class="p-4">
                <input type="email" name="" placeholder="Email address" class="font-sans text-sm px-2 h-10 bg-transparent border-b-2" />
            </div>

        </div>

        <button class="mx-auto bg-white text-black px-6 py-3 flex items-center justify-center text-sm hover:bg-gray-400">Subscribe</button>

    </form>

</div>

<div class="gallery px-12 py-20 flex flex-wrap gap-4 w-4/5 mx-auto">
    <p class="font-sans text-sm ml-3 max-w-xs leading-loose mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
    @foreach($images as $k => $image)
        {{--        {{ dd($image) }}--}}
{{--        <img class="w-auto h-72 flex-grow object-cover" src="/storage/{{ $image->image }}" />--}}
{{--        <a class="" href="/storage/{{ $image->image }}" >--}}
            <img class="myLinkModal w-auto h-72 flex-grow object-cover" src="/storage/{{ $image->image }}" />
{{--        </a>--}}


    @endforeach
</div>
<div id="myModal" class="">
{{--    <p>контент</p>--}}
    <img class="modal-content" src="" />
    <button class="prev bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-12">
        Prev
    </button>
    <button class="next bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-12 rounded-r">
        Next
    </button>

    <span id="myModal__close" class="close">×</span>

</div>
<div id="myOverlay"></div>

@endsection
