<?php

namespace App\Livewire;

use App\Models\UserComplemento;
use App\Rules\ValidaDocumento;
use App\Rules\ValidaEstabelecimento;
use App\Rules\ValidaEstado;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Complemento extends Component
{
    public array $estados = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
    ];

    #[Validate(['required', 'string', 'min:11', 'max:14', new ValidaDocumento])]
    public string $documento;

    #[Validate(['string', 'nullable'])]
    public ?string $nome = null;

    #[Validate(['required', 'string'])]
    public string $endereco;

    #[Validate(['required', 'string'])]
    public string $bairro;

    #[Validate(['required', 'string'])]
    public string $cidade;

    #[Validate(['required', 'string', new ValidaEstado])]
    public string $estado;

    #[Validate(['required', 'string'])]
    public string $cep;

    #[Validate(['string', 'nullable'])]
    public string $complemento;

    public function render()
    {
        return view('livewire.complemento');
    }

    public function enviar()
    {
        $this->validate();

        if(user()->empresa && empty($this->nome)) {

            session()->flash('nome', 'O nome da empresa é obrigatorio');

            $this->redirectRoute('complemento', navigate:true);

        }

        UserComplemento::query()->updateOrCreate(
            ['user_id' => user()->id],
            [
                'documento' => $this->documento,
                'nome' => $this->nome,
                'endereco' => $this->endereco,
                'bairro' => $this->bairro,
                'cidade' => $this->cidade,
                'estado' => $this->estado,
                'cep' => $this->cep,
                'complemento' => $this->complemento
            ]
        );

        $this->redirectIntended(navigate:true);

    }
}
