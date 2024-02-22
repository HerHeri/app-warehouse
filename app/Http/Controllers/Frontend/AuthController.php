<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    function login(Request $request){
        $title = 'Login Page';
        return view('auth.login', compact('title'));
    }

    function actionLogin(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $login = Request::create('api/action-login', 'POST', $data);
        $response = Route::dispatch($login);
        $content = json_decode($response->getContent());
        if($content->accessToken){
            return redirect('dashboard');
        }else{
            return redirect('login');
        }
    }

    function registrasi(Request $request){
        $title = 'Registrasi';
        return view('auth.registrasi', compact('title'));
    }
}
