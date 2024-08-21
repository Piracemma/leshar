<?php

use App\Http\Controllers\AutenticarGoogle;
use App\Livewire\Index;
use App\Livewire\Indx;
use App\Livewire\Login;
use App\Livewire\Registro;
use App\Livewire\TermosPolitica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Indx::class)->name('index');

Route::middleware(['auth', 'verified'])->group(function(){

    #Sair
    Route::get('/logout', function(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return to_route('index');
    })
    ->withoutMiddleware('verified')
    ->name('sair');


});

Route::get('/termos_e_politica', TermosPolitica::class)->name('termosepolitica');

Route::middleware(['guest'])->group(function(){

    Route::get('/login/{tipo}', Login::class)->middleware(['throttle:login'])->name('login');

    Route::get('/autenticargoogle/{tipo}', [AutenticarGoogle::class, 'autenticar'])->name('autenticar-google');

    Route::get('/registro/{tipo}', Registro::class)->name('registro');

});