<?php

namespace App\Http\Middleware;

use Closure;

class IsLogin
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
        if(session()->get('user')){
            return $next($request);
        }else{
            return redirect('user/login');  //如果用户没有登录 则跳去主页
        }

    }
}
