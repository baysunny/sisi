<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserActivity;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        if ($request->user() && $response instanceof Response) {
            // dd($request);
            $status = $response->getStatusCode();
            $statusText = Response::$statusTexts[$status] ?? 'Unknown';

            UserActivity::create([
                'id_user' => $request->user()->id_user,
                'deskripsi' => 'Method: ' . $request->method() . ' | Route: ' . ($request->route() ? $request->route()->getName() : 'Unnamed Route'),
                'status' => $statusText,
                'menu_id' => 'Non',
                'delete_mark' => '0',
                'created_by' => 'system',
            ]);
        }
        return $response;
    }
}
