<?php

namespace App\Business;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class NewBusiness
{
    public static function getNews()
    {
        try {
            $status = HttpCode::getCodeDefaultMessage();
            $news = News::orderBy('date','desc')->get()->makeHidden(['id']);
            if ($news)
                return response()->json(['body' => $news, 'msg' => $status['success']['msg']], $status['success']['code']);
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        } catch (\Exception $e) {
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        }
    }
}