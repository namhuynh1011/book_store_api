<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Authenticate
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
        $accessToken = $request->header('access_token');
        $userToken = User::where('access_token', $accessToken)->first();

        if (!$userToken) {
            return response()->json(['error' => $accessToken], 401);
        }

        return $next($request);
    }
}
