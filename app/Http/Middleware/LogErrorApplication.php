<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ErrorApplication;
use App\Models\UserActivity;

class LogErrorApplication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {

            // $response = $next($request);
            
            return $next($request);
        } catch (\Exception $exception) {
            $response = $next($request);
            if ($request->user() && $response instanceof Response) {
                // dd($request);
                $this->logError($request, $exception);
            }
        }
    }

    protected function logError(Request $request, \Exception $exception)
    {
        ErrorApplication::create([
            'id_user' => $request->user()->id_user,
            'error_date' => now(),
            'modules' => 'Module',
            'controller' => $request->route()->getActionName(),
            'function' => __FUNCTION__,
            'error_line' => $exception->getLine(),
            'error_message' => $exception->getMessage(),
            'status' => 'new',
            'param' => json_encode($request->all()),
            'delete_mark' => '0',
            'created_by' => 'system',
        ]);
    }
}
