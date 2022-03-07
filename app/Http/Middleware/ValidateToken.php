<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\User;

class ValidateToken
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
    $bearerToken = $request->bearerToken();
    
    if (!$bearerToken) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    $user = User::where('token', $bearerToken)->first();
    if (!$user) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    $request->attributes->add(['user' => $user]);
    
    return $next($request);
  }
}
