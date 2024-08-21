<div class="flex min-h-screen w-full justify-center items-center">
    
    <div>

        <div class="flex items-center justify-center pb-5">
            <a href="{{ route('index') }}">

                <img src="{{ url('/img/leshar.png') }}" alt="leshar" class="h-20 inline-block">

            </a>
        </div> 

        <div class="px-8 py-6 rounded-lg shadow-lg shadow-neutral-800 bg-neutral-800">

            <form wire:submit="logar">                
    
                <div class="mb-3">

                    <label class="block text-sm text-white mb-1 font-semibold" for="email">E-mail:</label>
                    <input wire:model="email" class="rounded-lg w-60 bg-neutral-600 text-gray-300 placeholder:text-gray-400 border-neutral-600" type="text" placeholder="E-mail">       
    
                </div>
    
                <div class="my-3">
    
                    <label class="block text-sm text-white mb-1 font-semibold" for="email">Senha:</label>
                    <input wire:model="password" class="rounded-lg w-60 bg-neutral-600 text-gray-300 placeholder:text-gray-400 border-neutral-600" type="password" placeholder="Senha">
    
                </div>

                <div class="flex items-center my-4">
                    <input wire:model="remember" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-white">Mantenha-me conectado.</label>
                </div> 
    
                <div class="mb-3 mt-4">
    
                    <button type="submit" class="p-2 rounded-lg bg-blue-700 font-semibold hover:bg-blue-800 text-white w-full">Entrar</button>
                    
                </div>
    
            </form>
            
            <div class="flex items-center my-3">
                <div class="flex-grow border-t border-stone-500"></div>
                <span class="mx-4 text-stone-500">ou</span>
                <div class="flex-grow border-t border-stone-500"></div>
            </div>
    
            <div>
    
                <button wire:click="loginGoogle" class="py-3 px-3 bg-blue-700 font-semibold hover:bg-blue-800 rounded-lg flex items-center justify-center w-full">
                    <svg class="w-6 h-6 text-white inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z" clip-rule="evenodd"/>
                    </svg>
                      
                    <span class="text-white ml-2">Entrar com Google</span>
                </button>
    
            </div>

        </div>

    </div>
    
</div>
