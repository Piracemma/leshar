<?php

use App\Http\Controllers\AutenticarGoogle;
use App\Livewire\Complemento;
use App\Livewire\Index;
use App\Livewire\Indx;
use App\Livewire\Login;
use App\Livewire\Profissao;
use App\Livewire\Registro;
use App\Livewire\TermosPolitica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'complemento', 'profissao'])->group(function(){
    
    #Sair
    Route::get('/logout', function(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return to_route('index');
    })
    ->withoutMiddleware('verified')
    ->name('sair');
    
    Route::get('/', Indx::class)->withoutMiddleware(['auth', 'verified'])->name('index'); 

    Route::get('/dados_complemento', Complemento::class)->withoutMiddleware(['complemento'])->name('complemento');

    Route::get('/profissional', Profissao::class)->withoutMiddleware(['profissao'])->name('profissao');

});

Route::get('/termos_e_politica', TermosPolitica::class)->name('termosepolitica');

Route::middleware(['guest'])->group(function(){

    Route::get('/login/{tipo}', Login::class)->middleware(['throttle:login'])->name('login');

    Route::get('/autenticargoogle/{tipo}', [AutenticarGoogle::class, 'autenticar'])->name('autenticar-google');

    Route::get('/registro/{tipo}', Registro::class)->name('registro');

});