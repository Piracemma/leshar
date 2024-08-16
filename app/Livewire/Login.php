<?php

namespace App\Livewire;

use Exception;
use Google\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use Livewire\Component;

class Login extends Component
{

    public function render()
    {
        return view('livewire.login');
    }

    public function loginGoogle()
    {

        try {

            
            $client = new Client();
    
            $guzzleClient = new GuzzleHttpClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]); // ['curl' => [CURLOPT_SSL_VERIFYPEER => false]] caso de erro de certificado
    
            $client->setHttpClient($guzzleClient);
            $client->setAuthConfig(storage_path('info/googlelogin.json'));
            $client->setRedirectUri(route('autenticar-google'));
            $client->addScope('email');
            $client->addScope('profile');
    
            return redirect()->away($client->createAuthUrl());

        } catch(Exception $e) {



        }


    }
}
