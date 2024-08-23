<?php

namespace App\Http\Middleware;

use App\Models\Profissao as ModelsProfissao;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Profissao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {

            if(!user()->empresa) {

                $profissao = ModelsProfissao::query()->where('user_id', '=', user()->id)->first();

                if(!$profissao) {

                    return to_route('profissao');

                }

            }

        }

        return $next($request);
    }
}
