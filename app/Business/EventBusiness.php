<?php

namespace App\Business;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class EventBusiness
{
    public static function getEvents()
    {
        try {
            $status = HttpCode::getCodeDefaultMessage();
            $events = Event::orderBy('date', 'desc')->get()->makeHidden(['id']);
            if ($events)
                return response()->json(['body' => $events, 'msg' => $status['success']['msg']], $status['success']['code']);
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        } catch (\Exception $e) {
            return response()->json(['msg' => $status['forbidden']['msg']], $status['forbidden']['code']);
        }
    }
}
