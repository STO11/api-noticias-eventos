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
        $credentials = $request->only(['email', 'password']);
        $status = HttpCode::getCodeDefaultMessage();
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['msg' => $status['unauthorized']['msg']], $status['unauthorized']['code']);
        }
        return $token;
    }

    public static function registerInApp($request, $input)
    {
        extract($request->only($input));
        $status = HttpCode::getCodeDefaultMessage();
        $password = Hash::make($password);
        $uuid = Uuid::uuid4();
        $user = User::create(compact($input))->makeHidden(['id']);
        if ($user) {
            return response()->json(['body' => $user, 'msg' => $status['success']['msg']], $status['success']['code']);
        }
        return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
    }

    public static function registerExternal($request, $input)
    {
        extract($request->only($input));
        $password = Hash::make($password);
        $uuid = Uuid::uuid4();
        $user = User::create(compact($input))->makeHidden(['id']);
        if ($user) 
            return response()->json(['body' => $user, 'msg' => $status['success']['msg']], $status['success']['code']);
        return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
    }
}
