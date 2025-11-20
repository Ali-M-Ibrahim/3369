<?php

namespace App\Http\Middleware;

use App\Traits\APIResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckKey
{
    use APIResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if($request->header('key')==123){
          return $next($request);
      }else{
          return $this->errorResponse(['msg'=>'missing key'],500);
      }
    }
}
