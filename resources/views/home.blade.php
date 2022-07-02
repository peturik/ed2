@extends('layouts.main')
@section('title', 'Home')
@section('content')

<div class="w-full flex flex-wrap md:h-screen pt-32">
    <div class="pt-6 md:pt-0 w-full md:flex-1 h-full md:order-last">
        <img src="img/1-1.jpg" class="w-full h-64 md:h-full object-cover" />
    </div>
    <div class="w-full p-6 pb-12 md:p-12 md:w-5/12 flex justify-center items-center relative">
        <div class="w-full relative text-center py-12 px-12 md:p-0 md:text-right">
            <h1 class="text-5xl mb-4">Eduard Petrasheshyn</h1>
            <h2 class="text-2xl mb-4">Sculpture</h2>
            <p class="leading-loose tracking-wide text-gray-700">Absolwent Akademii Sztuk Pięknych im. Jana Matejki w Krakowie</p>
            
            <p><b>Kontakt</b></p>
            <p>+48 537 125 153</p>
            <p><b>Adres email</b></p>
            <p>edu.roshyk@gmail.com</p>
        </div>
    </div>
</div>

@livewire('feedback')

<div class="gallery px-12 py-20 flex flex-wrap gap-4 w-4/5 mx-auto">

<h3 class="font-sans ml-3 max-w-xs leading-loose mb-4 italic">Oto galeria moich prac. Możesz przejść do zakładki <a href="{{ route('blog') }}" class="font-bold ">"My Works"</a>, aby się przyjrzeć
i bardziej szczegółowo przeglądać.</h3>




    @foreach($images as $k => $image)
            <img class="myLinkModal w-auto h-72 flex-grow object-cover" src="/storage/{{ $image->image }}" />
    @endforeach
</div>

<div id="myModal" class="">

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
