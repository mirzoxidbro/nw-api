<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->errorJson(['error' => 'Unauthorized'], 401);
        }

        if (auth()->user()->status == 'inactive') {
            return response()->errorJson("User isn't active", 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->successJson(auth()->user());
    }

    public function logout()
    {
        Auth::logout();

        return response()->successJson(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->successJson([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}
