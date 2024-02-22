<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        $user = User::firstWhere('email', $request->email);
        if ($user) {
            $checkpass = Hash::check($request->password, $user->password);
            if($checkpass){
                $token = $user->createToken($user->name);
                $user->remember_token = $token->plainTextToken;
                $user->save();
                return response()->json([
                    'accessToken' => $token->plainTextToken,
                    'user_id' => $token->accessToken->id,
                    'name' => $token->accessToken->name,
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Gagal Login',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function actionRegister(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            return 'Email sudah terdaftar';
        }else{
            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = 2;
            $user->save();
            return redirect('login')->with('success', 'Registrasi berhasil, silahkan login.');
        }
    }

    public function actionLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Success Logout',
        ]);;
    }
}
