<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Models\User;

class Check
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
        if (session('user')) {
            $FolderInfo = User::find(session('user.id'))->folders;
            view()->share('FolderInfo', $FolderInfo);
        }
        return $next($request);
    }
}
