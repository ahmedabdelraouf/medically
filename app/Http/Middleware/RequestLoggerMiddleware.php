<?php

namespace App\Http\Middleware;

use Dev\Infrastructure\Model\Log;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RequestLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function terminate(Request $request, $response)
    {
        try {
            $res = json_decode($response->content(), true);
            $logEntry = new Log();
            $logEntry->start_time = date('Y-m-d H:i:s', LARAVEL_START);
            $logEntry->url = $request->fullUrl();
            $logEntry->method = $request->method();
            $logEntry->body = json_encode($request->all());
            $logEntry->header = json_encode($request->header());
            $logEntry->ip_address = $request->ip();
            $logEntry->response = json_encode($response);
            $logEntry->status_code = $res['error'];
            $logEntry->save();
        }catch (\Exception $e){
        }
    }
}
