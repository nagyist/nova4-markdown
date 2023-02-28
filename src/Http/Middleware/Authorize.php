<?php
declare(strict_types=1);

namespace Nagyist\NovaMarkdown\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use Nagyist\NovaMarkdown\NovaMarkdown;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param \Closure(Request):mixed $next
     * @return Response|JsonResponse
     */
    public function handle(Request $request, \Closure $next): Response|JsonResponse
    {
        $tool = collect(Nova::registeredTools())->first([$this, 'matchesTool']);

        return optional($tool)->authorize($request) ? $next($request) : abort(403);
    }

    /**
     * Determine whether this tool belongs to the package.
     *
     * @param  \Laravel\Nova\Tool  $tool
     * @return bool
     */
    public function matchesTool(Tool $tool)
    {
        return $tool instanceof NovaMarkdown;
    }
}
