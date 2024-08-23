<?php

use Illuminate\Support\Facades\Auth;

if(! function_exists('user')) {

    function user()
    {
        if(Auth::check()) {

            return Auth::user();

        }
    }

}