<nav class="w-full h-16 shadow-md shadow-neutral-900 bg-neutral-950">
    

        <div class="flex justify-center">        
            <div class="flex items-center justify-between md:mx-20 mx-2 h-16 text-white w-full md:w-[80%]">

                <div class="flex items-center">
                    <a wire:navigate href="{{ route('index') }}">

                        <img src="{{ url('/img/leshar.png') }}" alt="leshar" class="h-12 inline-block">

                    </a>
                </div>            

                <div class="flex items-center">

                    <ul class="flex flex-row space-x-8">
                        @auth
    
                        <li><a href="{{ route('sair') }}" class="text-red-700">Sair</a></li>

                        @else

                        <li><a wire:navigate href="{{ route('login', ['tipo' => 'usuario']) }}">Login</a></li>

                        @endauth
                    </ul>

                </div>           

            </div>
        </div>

    
</nav>
