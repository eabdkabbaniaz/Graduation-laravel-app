<?php

namespace Modules\Exam\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTeacher
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()?->role !== 'teacher') {
            return response()->json(['message' => 'Unauthorized. Only teachers can perform this action.'], 403);
        }

        return $next($request);
    }
}
