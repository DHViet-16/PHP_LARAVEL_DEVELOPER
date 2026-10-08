<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRegistrationAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age = $request->input('age');
        if ($age === null) {
            return response()->json([
                'message' => 'Age is required.'
            ], 422);
        }
        if (!is_numeric($age)) {
            return response()->json([
                'message' => 'Age must be a valid number.'
            ], 422);
        }
        if ($age < 18) {
            return response()->json([
                'message' => 'You are under 18 years of age.'
            ], 403);
        }

        return $next($request);
    }
}
