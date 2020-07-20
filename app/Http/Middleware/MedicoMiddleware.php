<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use App\Models\Usuario;

class MedicoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            $jwt = $request->header('Authorization');
            $dados = JWT::decode($jwt, config('jwt.senha'), ['HS256']);
            $usuario = Usuario::where('medico', true)->where('id', $dados->id)->first();
            if ($usuario)
                return $next($request);
            else
                return response()->json(['erro' => 'Apenas médico podem acessar essa rota'], 403);
        } catch (\Exception $e) { 
            //Adicionar \ antes no Exception, porque estamos no namespace App\Http\Middleware
            //Do contrário ele vai procura Exception nesse caminho. 
            return response()->json(['erro' => 'Token inválido'], 403);
        }
    }
}
