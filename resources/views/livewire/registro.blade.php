<div class="flex flex-col justify-center items-center w-full min-h-screen p-3">    
    
    <div class="mb-4">
        <a wire:navigate href="{{ route('index') }}" class="inline-block text-xl">
            <img class="h-20 inline-block" src="{{ url('img/leshar.png') }}" alt="LeShar">   
        </a>
    </div>
    <form wire:loading.remove wire:target="register" class="rounded-2xl sm:p-8 sm:w-96 bg-neutral-900 w-full p-6 shadow-lg shadow-neutral-800" wire:submit="register">
        <div class="mb-4">
            <label for="nome" class="inline-block mb-1 text-sm font-medium text-white">Nome</label>
            <input wire:model.live="name" type="text" id="nome" class=" text-sm rounded-lg block w-full bg-neutral-700 border-neutral-600 placeholder-gray-400 text-white focus:ring-blue-700 focus:border-blue-700">
            @error('name')
                <span class="text-xs text-red-400">*{{ $message }}</span>
            @enderror            
        </div>
        <div class="mb-4">
            <label for="sobrenome" class="inline-block mb-1 text-sm font-medium text-white">Sobrenome</label>
            <input wire:model.live="sobrenome" type="text" id="sobrenome" class=" text-sm rounded-lg block w-full bg-neutral-700 border-neutral-600 placeholder-gray-400 text-white focus:ring-blue-700 focus:border-blue-700">
            @error('sobrenome')
                <span class="text-xs text-red-400">*{{ $message }}</span>
            @enderror            
        </div>
        <div class="mb-4">
            <label for="email_confirmation" class="block mb-1 text-sm font-medium text-white">E-mail</label>
            <input wire:model.live="email_confirmation" type="email" id="email_confirmation" class=" text-sm rounded-lg block w-full bg-neutral-700 border-neutral-600 placeholder-gray-400 text-white focus:ring-blue-700 focus:border-blue-700">
            @error('email_confirmation')
                <span class="text-xs text-red-400">*{{ $message }}</span>
            @enderror            
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-1 text-sm font-medium text-white">Confirmação de E-mail</label>
            <input wire:model.live="email" type="email" id="email" class=" text-sm rounded-lg block w-full bg-neutral-700 border-neutral-600 placeholder-gray-400 text-white focus:ring-blue-700 focus:border-blue-700">
            @error('email')
                <span class="text-xs text-red-400">*{{ $message }}</span>
            @enderror            
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-1 text-sm font-medium text-white">Senha</label>
            <input wire:model.live="password" type="password" id="password" class=" text-sm rounded-lg block w-full bg-neutral-700 border-neutral-600 placeholder-gray-400 text-white focus:ring-blue-700 focus:border-blue-700">
            @error('password')
                <span class="text-xs text-red-400">*{{ $message }}</span>
            @enderror            
        </div>
        <div class="mb-4">
            <input type="checkbox" wire:model.live="aceito_termos" id="aceito_termos" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            <label for="aceito_termos" class="text-xs text-white">Aceito os <a class="text-blue-500 hover:text-blue-700" href="{{route('termosepolitica')}}" target="_blank">Termos de Uso e Politica de Privacidade.</a></label>
            @error('aceito_termos')
                <span class="text-xs text-red-400 block">*{{ $message }}</span>
            @enderror  
        </div>
        <div>
            <button type="submit" class="w-full text-lg p-2 rounded-md text-white font-semibold bg-blue-700 hover:bg-blue-800">Cadastrar</button>
        </div>
        <div class="flex items-center my-3">
            <div class="flex-grow border-t border-stone-500"></div>
            <span class="mx-4 text-stone-400">ou</span>
            <div class="flex-grow border-t border-stone-500"></div>
        </div>

        <div>

            <button wire:click="loginGoogle" type="button" class="py-3 px-3 bg-blue-700 hover:bg-blue-800 rounded-lg flex items-center justify-center w-full">
                <svg class="w-6 h-6 text-white inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z" clip-rule="evenodd"/>
                </svg>
                  
                <span class="text-white ml-2 font-semibold">Cadastrar com Google</span>
            </button>

        </div>
    </form>
    <div class="mt-4">
        <div wire:loading wire:target="register" class="flex justify-center">
            <svg aria-hidden="true" class="w-8 h-8  animate-spin text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
        </div>
    </div>
</div>