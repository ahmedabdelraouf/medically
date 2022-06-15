<?php

namespace App\Http\Middleware;

use App\Http\Traits\ResponseTraits;
use Closure;
use Dev\Infrastructure\Model\User;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Symfony\Component\HttpFoundation\Response;


class FirebaseMiddleware
{
    use ResponseTraits;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $defaultAuth = Firebase::auth();
            $firebaseUser = $defaultAuth->getUser($request->header('uid'));
            if (isset($firebaseUser)) {
                $user = User::where('api_token', $request->header('uid'))->first();
                if ($user != null) {
                    //TODO here we need to find way to validate user server token genereted before by firebase library.
//                    $defaultAuth->parseToken($request->header('server_token'));
                    return $next($request);
                }
            }
        } catch (\Exception $exception) {
            return $this->res();
        }
        return $this->res();
    }

    public function res()
    {
        return $this->prepareApiResponse(true, trans('general.invalid_credentials'),
            trans('general.something_went_wrong'), '', Response::HTTP_FORBIDDEN,
            Response::HTTP_FORBIDDEN, Response::HTTP_FORBIDDEN);
    }
}
