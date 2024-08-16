<?php

use App\Http\Controllers\AutenticarGoogle;
use App\Livewire\Index;
use App\Livewire\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');

Route::get('/login', Login::class)->name('login');

Route::get('/autenticargoogle', [AutenticarGoogle::class, 'autenticar'])->name('autenticar-google');

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