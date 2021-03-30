<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Dotenv\Result\Success;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       //recuperiamo il token
        $api_token = $request->header('authorization');
        // dd($api_token);
        if(empty($api_token)){
            return response()->json([
                'success' => false,
                'error'=> 'non sei autenticato'
            ]);
        }
        //togliamo la parte Bearer prima con substr
        $api_token = substr($api_token,7);
        // dd($api_token);

        //controlliamo se l'utente con quel token è presente nel db
        $user = User::where('api_token',$api_token)->first();
        // dd($user);
        if(!$user){
            return response()->json([
                'success' => false,
                'error'=> 'non sei autenticato'
            ]);
        }

        return $next($request);
    }
}
