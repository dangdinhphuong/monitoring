<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class LoginMiddleware
{
    /**
     * Handle an incoming request. ph , turbidity, temperature , do , tọa đô
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->user()){
            if(User::where('status',1)->where('id',auth()->user()->id)->first()){
                return $next($request);
            }
        }
        return redirect()->route('login');
    }
}
