<div class="flex justify-center">
    
    <form wire:submit='criar'>

        <div>
            <label for="cargo" class="text-white">Cargo</label>
            <select wire:model.live="cargo" id="cargo">
                <option>Selecione o Cargo</option>
                @foreach ($cargos as $item)
                    <option value="{{$item->id}}">{{$item->cargo}}</option>
                @endforeach
            </select>
            @error('cargo')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="sobre" class="text-white">sobre sua experiencia</label>
            <textarea wire:model.live="sobre" id="sobre" cols="20" rows="3"></textarea>
            @error('sobre')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="tempo_experiencia" class="text-white">tempo de experiencia</label>
            <input wire:model.live="tempo_experiencia" type="number" step="1" min="1" id="tempo_experiencia">
            <select wire:model="medida_tempo" id="medida">
                <option value="anos">Anos</option>
                <option value="meses">Meses</option>
            </select>
            @error('tempo_experiencia')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
            @error('medida_tempo')
                <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        @foreach ($experiencias as $item => $experiencia )
        
            <hr>
            <div>
                <label for="experiencia{{$item}}" class="text-white">Função</label>
                <input wire:model.live='experiencias.{{$item}}.funcao' type="text" id="experiencia{{$item}}">
                @error('experiencias.'.$item.'.funcao')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="funcao{{$item}}" class="text-white">O que fez</label>
                <textarea id="funcao{{$item}}" wire:model.live='experiencias.{{$item}}.oque_fez' cols="20" rows="3"></textarea>
                @error('experiencias.'.$item.'.oque_fez')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="button" wire:click='removerExperiencia({{$item}})' class="text-red-600">Remover</button>
            <hr>

        @endforeach
        <button type="button" wire:click='adicionarExperiencia' class="text-blue-600">Adicionar +</button>

        <button type="submit" class="font-semibold text-white">Enviar</button>

    </form>
    
</div>
