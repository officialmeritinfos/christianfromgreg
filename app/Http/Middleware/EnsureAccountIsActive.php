<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAccountIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if($user->status !=1){
            Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->to(route('login'))->with('error','You are not authorized to access this page. Contact support');
        }

        return $next($request);
    }
}
