<?php

namespace App\Http\Middleware;

use App\Http\Traits\ResponseTraits;
use Closure;
use Dev\Infrastructure\Model\User;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;
use Symfony\Component\HttpFoundation\Response;


class ApiTokenCheckMiddleware extends Middleware
{
    use ResponseTraits;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $apiToken = $request->header('api_token');
        if (isset($apiToken)) {
            $api_token = $request->header('api_token');
            if (isset($api_token)) {
                $user = User::where('api_token', $api_token)->first();
                if (isset($user)) {
                    $request->request->add(['doctor_id' => $user->id]); //add request
                    return $next($request);
                }
            }
        }
        return $this->prepareApiResponse(true, trans('general.not_authorized'),
            trans('general.not_authorized'), [], Response::HTTP_FORBIDDEN,
            Response::HTTP_FORBIDDEN, Response::HTTP_FORBIDDEN);
    }

}
