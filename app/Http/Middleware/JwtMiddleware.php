<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;


class JwtMiddleware
{


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['status' => 1, 'error' => true, 'message' => 'user not found'], 401);
            }
            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['status' => 1, 'error' => true, 'message' => 'token expired'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['status' => 1, 'error' => true, 'message' => 'invalid token'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['status' => 1, 'error' => true, 'message' => 'User not defined'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['status' => 1, 'error' => true, 'message' => 'unknown'], 401);
        }
        return $next($request);
    }

}
