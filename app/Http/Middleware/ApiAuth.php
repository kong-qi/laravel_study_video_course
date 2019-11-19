<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next, $guards)
    {
        $status=$this->authenticate($request, $guards);
        if(!$status)
        {
            return response()->json(['code'=>1,'msg'=>'没有登陆']);
        }

        return $next($request);
    }

    protected function authenticate($request, $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }
        if ($this->auth->guard($guards)->check()) {
            $this->auth->shouldUse($guards);
            return true;
        }

        return false;
    }



}
