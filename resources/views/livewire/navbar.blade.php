<nav class="w-full h-16 shadow-md shadow-neutral-300 dark:shadow-neutral-800 bg-white dark:bg-neutral-900">
    @auth
        
    @else

        <div class="flex justify-center">        
            <div class="flex items-center justify-between md:mx-20 mx-2 h-16 text-stone-800 dark:text-white w-full md:w-[80%]">

                <div class="flex items-center">
                    <img src="{{ url('/img/leshar.png') }}" alt="leshar" class="h-12 inline-block">
                    <span class="text-2xl font-semibold text-stone-700 dark:text-white ml-2">LeShar</span>
                </div>            

                <div class="flex items-center">

                    <ul class="flex flex-row space-x-8">
                        <li><a wire:navigate href="{{ route('index') }}">Inicio</a></li>
                        <li><a wire:navigate href="{{ route('index') }}">teste</a></li>
                        <li><a wire:navigate href="{{ route('index') }}">teste 2</a></li>
                    </ul>

                </div>

                <div class="flex items-center ml-5">

                    <x-theme-switch only-icons />

                </div>            

            </div>
        </div>

    @endauth
</nav>
