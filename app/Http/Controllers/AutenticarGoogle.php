<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Google\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use Google\Service\Oauth2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AutenticarGoogle extends Controller
{
    public function autenticar(Request $request)
    {

        try {
            
            if($request->get('code')) {
                
                $client = new Client;
                $guzzleClient = new GuzzleHttpClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]); // ['curl' => [CURLOPT_SSL_VERIFYPEER => false]] caso de erro de certificado
                
                $client->setHttpClient($guzzleClient);
                $client->setAuthConfig(storage_path('info/googlelogin.json'));
                $client->setRedirectUri(route('autenticar-google'));
                $client->addScope('email');
                $client->addScope('profile');

                $code = $request->get('code');
                
                $token = $client->fetchAccessTokenWithAuthCode($code);

                $client->setAccessToken($token['access_token']);
                
                $googleService = new OAuth2($client);

                $usuario = $googleService->userinfo->get();

                $user = User::query()->updateOrCreate(
                    ['email' => $usuario->email],
                    [
                            'name' => $usuario->givenName,
                            'sobrenome' => $usuario->familyName,
                            'email_verified_at' => now(),
                            'remember_token' => Str::random(10),
                        ]
                );                
                
                Auth::login($user, true);               

                $request->session()->regenerate();

                return redirect()->intended();

            }

        } catch(Exception $e) {

            return to_route('login', ['error' => 'Erro ao se conectar.']);

        }


    }
}
