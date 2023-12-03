<?php

namespace App\Http\Middleware;

use App;
use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;

/**
 * Class AdminUserVerified
 */
class AdminUserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        if (Auth::user()->user_type != User::ADMIN) {
            return redirect()->back();
        }

        return $next($request);
    }
}
