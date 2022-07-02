<div class="w-full -mt-10 pt-32 pb-24 px-12 text-center bg-black text-white">
@csrf
    <h2 class="text-4xl mb-6">To contact me...</h2>
    <p class="font-sans text-sm mx-auto max-w-xl leading-loose mb-4">To contact me, please fill out the form below.</p>

    <div class="pt-10 mb-6 flex flex-wrap justify-center items-end text-left">

        <div class="p-4">
            
            <input type="text" wire:model="name" name="name" placeholder="Your name" class="font-sans text-sm px-2 h-10 bg-transparent border-b-2" required>
        </div>
        <div class="p-4">
            <input type="email" wire:model="email" name="email" placeholder="Email address" class="font-sans text-sm px-2 h-10 bg-transparent border-b-2" required>
        </div>

    </div>
    <div class="">
        <div class="">
            <textarea wire:model="body" cols="23" rows="5" name="message" placeholder="Your message" class="font-sans text-sm px-2 bg-transparent border-b-2"></textarea>
        </div>
    </div>

<button class="but mx-auto bg-white text-black px-6 py-3 flex items-center justify-center text-sm hover:bg-gray-400" wire:click="sendMessage">Send</button>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if($isSuccess)
        <div class="rounded-md bg-green-100 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-green-800">Successfully</h3>
                    <div class="mt-2 text-sm text-green-700">
                        <p>Your  message has been send.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="mes"></div>
</div>
