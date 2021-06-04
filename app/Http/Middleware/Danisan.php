<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Uye;

class Danisan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token=$request->token;
        $query=Uye::where("token",$request->token)->where("rol",2)->first();
        if($query){
            return $next($request);
        }else{
            die("giriş başarısız");
        }
    }
}
