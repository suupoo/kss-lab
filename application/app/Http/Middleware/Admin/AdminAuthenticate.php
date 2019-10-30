<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
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
        /* todo:管理者権限エラーは404ではなく個別エラーに分離する */
        //ログイン中ではない
        //管理者権限を持たない
        if( !Auth::user() || Auth::user()->admin_permission == null )
            abort(404);

        return $next($request);
    }
}
