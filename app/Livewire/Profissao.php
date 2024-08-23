<?php

namespace App\Livewire;

use App\Models\Cargo;
use App\Models\Cargos;
use App\Models\Profissao as ModelsProfissao;
use App\Rules\ValidaCargo;
use App\Rules\ValidaMedidaTempo;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Profissao extends Component
{
    #[Validate([
        'experiencias' => ['array'], 
        'experiencias.*.funcao' => ['string', 'min:3', 'required'],
        'experiencias.*.oque_fez' => ['string', 'min:10', 'required'],
    ])]
    public array $experiencias = [
        [
            'funcao' =>  null,
            'oque_fez' =>  null
        ],
        [
            'funcao' => null,
            'oque_fez' => null
        ],
    ];

    #[Validate(['string', 'required', new ValidaCargo])]
    public ?string $cargo;

    #[Validate(['string', 'required', 'min:10'])]
    public ?string $sobre;

    #[Validate(['integer', 'required'], as:'tempo de experiencia')]
    public ?int $tempo_experiencia;

    #[Validate(['string', 'required', new ValidaMedidaTempo])]
    public string $medida_tempo = 'anos';

    public function messages() 
    {
        return [
            'experiencias.*.funcao.string' => 'O campo função deve ser um texto.',
            'experiencias.*.funcao.min' => 'O campo função deve no minimo :min caracteres.',
            'experiencias.*.funcao.required' => 'O campo função é obrigatorio.',
            'experiencias.*.oque_fez.string' => 'O campo o que fez deve ser um texto.',
            'experiencias.*.oque_fez.min' => 'O campo o que fez deve no minimo :min caracteres.',
            'experiencias.*.oque_fez.required' => 'O campo o que fez é obrigatorio.',
        ];
    }

    public function render()
    {
        return view('livewire.profissao', [
            'cargos' => Cargo::all()
        ]);
    }

    public function removerExperiencia(int $item)
    {

        if(key_exists($item, $this->experiencias)) {

            unset($this->experiencias[$item]);

        }

    }

    public function adicionarExperiencia()
    {
        $this->experiencias[] = [
            'experiencia' => null,
            'funcao' => null
        ];
    }

    public function criar()
    {
        $this->validate();

        $tempo_experiencia = null;

        if($this->medida_tempo == 'anos') {
            $tempo_experiencia = Carbon::now()->addYears((-1)*$this->tempo_experiencia);
        } else {
            $tempo_experiencia = Carbon::now()->addMonths((-1)*$this->tempo_experiencia);
        }

        $profissao = ModelsProfissao::query()->updateOrCreate(
            ['cargo_id' => $this->cargo, 'user_id' => user()->id],
            [
                'sobre' => $this->sobre,
                'tempo_experiencia' => $tempo_experiencia
            ]
        );

        if($this->experiencias) {
            foreach($this->experiencias as $experiencia) {
                $profissao->experiencias()->create([
                    'funcao' => $experiencia['funcao'],
                    'oque_fez' => $experiencia['oque_fez']
                ]);
            }
        }

        $this->redirectIntended(navigate:true);

    }
}
