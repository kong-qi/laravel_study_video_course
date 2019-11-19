<?php

namespace App\Http\Middleware;

use Closure;

class CheckKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$number=0)
    {
        $rep= $next($request);
        if($number==100)
        {
            return  $rep;
        }
        return response()->view('errors.error',['message'=>'这把钥匙不对']);
        //echo '请使用一把钥匙';

        //echo '你的钥匙能够匹配才能进入';


    }
}
