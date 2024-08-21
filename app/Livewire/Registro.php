<?php

namespace App\Livewire;

use App\Models\User;
use App\Rules\AceitaTermos;
use App\Rules\TipoUsuarioRegistro;
use App\Rules\ValidaSenha;
use Exception;
use Google\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Registro extends Component
{
    #[Validate(['required', 'string', 'max:255'])]
    public ?string $name;

    #[Validate(['required', 'string'])]
    public ?string $sobrenome;

    #[Validate(['required','email', 'confirmed', 'max:255', 'unique:'.User::class])]
    public string $email = '';

    #[Validate(['required', 'email'], as:'-email')]
    public string $email_confirmation = '';

    #[Validate(['required', 'string', 'min:8', new ValidaSenha])]
    public ?string $password;

    #[Validate(['boolean', 'required', new AceitaTermos])]
    public bool $aceito_termos = false;

    #[Validate(['string', new TipoUsuarioRegistro])]
    public string $tipo;

    #[Layout('components.layouts.guest')]
    public function render()
    {
        return view('livewire.registro');
    }

    public function register()
    {
        $this->validate();

        $empresa = $this->tipo == 'empresa' ? true : false;

        $user = User::query()->create([
            'name' => $this->name,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'empresa' => $empresa,
            'password' => $this->password
        ]);

        Auth::login($user);

        request()->session()->regenerate();

        // event(new Registered($user));

        $this->redirectRoute('index', navigate:true);
    }

    public function loginGoogle()
    {

        try {
            $this->validateOnly('tipo');
            
            $client = new Client();
    
            $guzzleClient = null;

            if(env('APP_ENV') == 'local') {

                $guzzleClient = new GuzzleHttpClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]); // ['curl' => [CURLOPT_SSL_VERIFYPEER => false]] caso de erro de certificado

            } else {

                $guzzleClient = new GuzzleHttpClient();

            }
    
            $client->setHttpClient($guzzleClient);
            $client->setAuthConfig(storage_path('info/googlelogin.json'));
            $client->setRedirectUri(route('autenticar-google', ['tipo' => $this->tipo]));
            $client->addScope('email');
            $client->addScope('profile');
    
            return redirect()->away($client->createAuthUrl());

        } catch(Exception $e) {



        }


    }
}
