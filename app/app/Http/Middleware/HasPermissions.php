<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @param mixed ...$permissions
     * @return Response
     */
    public function handle(Request $request, Closure $next, ...$permissions): Response
    {
        foreach ($permissions as $permission) {
            if (!$request->user()->hasPermission($permission)) {
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
