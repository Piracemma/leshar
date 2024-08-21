<div>
    <x-container>

        @auth


            
        @else

            <div>

                <div>

                    <div>
                        
                        <span class="text-2xl text-white">Encontre as melhores vagas para sua area</span>
                        
                        <div class="">
    
                            <a href="{{route('registro', ['tipo' => 'usuario'])}}" class="p-3 rounded-lg bg-blue-700 text-white font-semibold inline-block">Cadastre-se</a>
    
                        </div>
                        
                    </div>

                    <div>
                        
                        <p class="text-2xl text-white">Encontre os melhores profissionais Freelancer para sua empresa</p>
                        
                        <div>
    
                            <a href="{{route('registro', ['tipo' => 'empresa'])}}" class="p-3 rounded-lg bg-blue-700 text-white font-semibold inline-block">Cadastre-se</a>
    
                        </div>
                        
                    </div>

                </div>

            </div>

        @endauth

    </x-container>
</div>
