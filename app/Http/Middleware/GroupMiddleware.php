<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\UserGroup;

class GroupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $group)
    {
        $allow  = false;  
        $usertype = $request->user()->usertype;  
        if ($usertype==$group) {
            $request->session()->put('app.group',$group);
            $allow = true;
        }  
        if(!$allow){
            throw new HttpException(503);
        }
        return $next($request);
    }

}
