<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class APIVersion
 * @package App\Http\Middleware
 */
class APIVersion
{
    /**
     * The Response Factory our app uses
     *
     * @var ResponseFactory
     */
    protected ResponseFactory $factory;

    /**
     * JsonMiddleware constructor.
     *
     * @param ResponseFactory $factory
     */
    public function __construct(ResponseFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard): mixed
    {
        $request->headers->set('Accept', 'application/json');
        config(['app.api.version' => $guard]);
        $response = $next($request);

        // If the response is not strictly a JsonResponse, force it
        if (!$response instanceof JsonResponse) {
            $response = $this->factory->json(
                $response->content(),
                $response->status(),
                $response->headers->all()
            );
        }
        return $response;
    }
}
