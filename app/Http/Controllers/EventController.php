<?php

namespace App\Http\Controllers;

use App\Business\EventBusiness;
use App\Models\Event;

class EventController extends Controller
{
    public function getEvents()
    {
        $input = ['events'];
        return EventBusiness::getEvents();
    }
}
