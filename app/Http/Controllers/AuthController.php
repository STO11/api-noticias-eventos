<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Bussines\HttpCode;
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
        $this->middleware('auth:api', ['except' => ['login', 'registerInApp', 'me']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
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
        extract($request->only($input));
        $password = Hash::make($password);
        $uuid = Uuid::uuid4();
        $user = User::create(compact($input));
        if ($user)
            return response()->json(['user' => $user], 201);
        return response()->json(['msg' => 'Usuário não pode ser criado'], 406);
    }

    /**
     * Requester User with Google and Facebook
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerExternal(Request $request) 
    {
        $input = ['name', 'email', 'password', 'uuid'];
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:user,email',
        ]);
        extract($request->only($input));
        $password = Hash::make($password);
        $uuid = Uuid::uuid4();
        $user = User::create(compact($input));
        if($user) 
            return response()->json(['user' => $user], 201);
        return response()->json(['msg' => 'Usuário não pode ser criado'], 406);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}