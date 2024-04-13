<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class AdminAuth extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse|\Flugg\Responder\Http\Responses\SuccessResponseBuilder
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return responder()->success([
            'token'=>$token,
            'user'=>[
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email
            ]
        ]
        );
    }

    public function user(Request $request)
    {
        return  $request->user();
    }
}
