<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class MyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $_COOKIE['token'] ?? null;
        $req = Request::create(url('api/me'), 'GET');
        $req->headers->set('Authorization', 'Bearer '.$token);
        $res = app()->handle($req);
        if($token !== null){
            $sCode = $res->getStatusCode();
            if($sCode == 200){
                return $next($request);
            }else{
                return redirect('login');
            }
        }else{
            return redirect('login');
        }

    }
}
