<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Business\AuthBusiness;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registerInApp', 'registerExternal', 'me']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        return AuthBusiness::login($request);
        //return $this->respondWithToken($token);
    }

    /**
     * Requester User in app default
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerInApp(Request $request)
    {
        $input = ['name', 'email', 'password', 'uuid'];
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        return AuthBusiness::registerInApp($request, $input);
    }

    /**
     * Requester User with Google and Facebook
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerExternal(Request $request)
    {
        $input = ['name', 'email', 'password', 'uuid'];
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:user,email',
        ]);
        return AuthBusiness::registerExternal($request, $input);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
