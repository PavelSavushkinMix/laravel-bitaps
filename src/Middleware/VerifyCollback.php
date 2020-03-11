<?php

namespace App\Http\Middleware;

use Closure;
use PostMix\LaravelBitaps\Models\Address;


class VerifyCollback
{
    public function handle($request, Closure $next)
    {
        if (!$request->has('address') || !Address::where('address', $request->input('address'))->count()) {
            return response()->json(['message' => trans('Data is valid')]);
        }

        return $next($request);
    }
}