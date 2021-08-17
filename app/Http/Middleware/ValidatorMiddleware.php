<?php

namespace App\Http\Middleware;

use App\Http\Lib\Validators\Validator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ValidatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentRoute = Route::currentRouteAction();
        $functionName = explode('@', $currentRoute)[1];
        $validator = new Validator();
        if (method_exists($validator, $functionName)) {
            $validatorResponse = $validator->$functionName($request->all());
            if ($validatorResponse === true)
                return $next($request);
            return response()->json($validatorResponse, '422');

        }
        return $next($request);
    }

}
