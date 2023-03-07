<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $user = auth()->user();
            $token =  $user->createToken('MyApp')->plainTextToken;
            return response()->json([
                $token,
                $user
            ]);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorized']);
        }
    }

    public function me()
    {
        return response()->successJson(auth()->user());
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->successJson('Logged out');
    }
}