<?php

namespace App\Livewire;

use App\Rules\TipoUsuarioRegistro;
use Exception;
use Google\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Login extends Component
{
    use Interactions;

    #[Validate(['required','email'])]
    public ?string $email;

    #[Validate(['required', 'string'])]
    public ?string $password;

    #[Validate(['string', new TipoUsuarioRegistro])]
    public string $tipo;

    #[Validate(['boolean'])]
    public bool $remember = false;

    #[Layout('components/layouts/guest')]
    public function render()
    {
        return view('livewire.login');
    }

    public function loginGoogle()
    {

        try {

            
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

    public function logar()
    {
        $this->validate();

        $empresa = $this->tipo == 'empresa' ? true : false;

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'empresa' => $empresa], $this->remember)) {

            request()->session()->regenerate();
            $this->redirectIntended('/');

        } else {

            $this->toast()->error('Erro ao logar!', 'Verifique os dados passados.')->send();

        }
        
    }
}
