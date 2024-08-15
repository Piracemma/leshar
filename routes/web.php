<?php

use App\Http\Controllers\AutenticarGoogle;
use App\Livewire\Index;
use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');

Route::get('/login', Login::class)->name('login');

Route::get('/autenticargoogle', [AutenticarGoogle::class, 'autenticar'])->name('autenticar-google');
