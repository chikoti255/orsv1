<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;


class GenerateSafeSubmitToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->isMethod('POST') && (!session()->has('custom_token') || is_null($request->input('custom_token')))) {
            //via the request $request->session()->put('custom_token', Str::random(40));

            session(['custom_token' => Str::random(40)]);
        }

        if($request->isMethod('POST') && !hash_equals(session()->get('custom_token'), $request->input('custom_token'))) {
            return redirect()->back()->withErrors('Token mismatch');
            //dd(session()->get('custom_token'), $request->input('custom_token'));

        }
          //making the middleware the request to handle task after the request is handled by application
          //$response = $next($request);  first the response to be handled by application

          return $next($request);
    }
}
