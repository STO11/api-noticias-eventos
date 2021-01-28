<?php

namespace App\Http\Controllers;

use App\Business\NewBusiness;
use App\Models\News;

class NewController extends Controller
{
    public function getNews()
    {
        return NewBusiness::getNews();
    }
}
