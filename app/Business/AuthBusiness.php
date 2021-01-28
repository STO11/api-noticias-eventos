<?php

namespace App\Business;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class AuthBusiness
{
    public static function login($request)
    {
        try {
            $credentials = $request->only(['email', 'password']);
            $status = HttpCode::getCodeDefaultMessage();
            if (!$token = self::attemptLogin($credentials)) {
                return response()->json(['msg' => $status['unauthorized']['msg']], $status['unauthorized']['code']);
            }
            $user = User::where('email', $credentials['email'])->first();
            if ($user)
                return response()->json(['body' => $user, 'token' => $token, 'msg' => $status['success']['msg']], $status['success']['code']);
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        } catch (\Exception $e) {
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        }
    }

    public static function registerInApp($request, $input)
    {
        try {
            extract($request->only($input));
            $status = HttpCode::getCodeDefaultMessage();
            $password = Hash::make($password);
            $uuid = Uuid::uuid4();
            $user = User::create(compact($input))->makeHidden(['id']);
            if ($user) {
                $credentials = $request->only(['email', 'password']);
                $token = AuthBusiness::attemptLogin($credentials);
                return response()->json(['body' => $user, 'token' => $token, 'msg' => $status['success']['msg']], $status['success']['code']);
            }
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        } catch (\Exception $e) {
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        }
    }

    public static function registerExternal($request, $input)
    {
        try {
            extract($request->only($input));
            $status = HttpCode::getCodeDefaultMessage();
            $password = Hash::make($password);
            $uuid = Uuid::uuid4();
            $user = User::create(compact($input))->makeHidden(['id']);
            if ($user) {
                $credentials = $request->only(['email', 'password']);
                $token = AuthBusiness::attemptLogin($credentials);
                return response()->json(['body' => $user, 'token' => $token, 'msg' => $status['success']['msg']], $status['success']['code']);
            }
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        } catch (\Exception $e) {
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        }
    }

    public static function logout()
    {
        try {
            $status = HttpCode::getCodeDefaultMessage();
            Auth::logout();
            return response()->json(['msg' => $status['success']['msg']], $status['success']['code']);
        } catch (\Exception $e) {
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        }
    }

    public static function attemptLogin($credentials)
    {
        $token = Auth::attempt($credentials);
        return $token;
    }
}
