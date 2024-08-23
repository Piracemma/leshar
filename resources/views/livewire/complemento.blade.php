<div class="flex justify-center">
    
    <form wire:submit="enviar">

        <p class=" text-white">Falta só mais algumas informaçoes para concluir o cadastro.</p>

        <div>
            <label class=" text-white" for="documento">Documento</label>
            <input wire:model.live='documento' type="text" id="documento">
            @error('documento')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        @if (user()->empresa)
        <div>
            <label class=" text-white" for="nome">Nome Comercial da Empresa</label>
            <input wire:model.live='nome' type="text" id="nome">
            @session('nome')
                <span class="text-red-500">{{session('nome')}}</span>
            @endsession
        </div>
        @endif

        <div>
            <label class=" text-white" for="endereco">endereco</label>
            <input wire:model.live='endereco' type="text" id="endereco">
            @error('endereco')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class=" text-white" for="bairro">bairro</label>
            <input wire:model.live='bairro' type="text" id="bairro">
            @error('bairro')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class=" text-white" for="cidade">cidade</label>
            <input wire:model.live='cidade' type="text" id="cidade">
            @error('cidade')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class=" text-white" for="estado">Estado</label>
            <select id="estado" wire:model.live='estado'>
                <option>Estado:</option>
                @foreach ($estados as $sigla => $item)
                    <option value="{{$sigla}}">{{$item}}</option>
                @endforeach
            </select>
            @error('estado')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class=" text-white" for="cep">cep</label>
            <input wire:model.live='cep' type="text" id="cep">
            @error('cep')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class=" text-white" for="complemento">complemento</label>
            <input wire:model.live='complemento' type="text" id="complemento">
            @error('complemento')
                <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <button type="submit" class=" text-white">enviar</button>
        </div>


    </form>
    
</div>
