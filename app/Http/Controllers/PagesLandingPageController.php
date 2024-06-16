<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesLandingPageController extends Controller
{
    public function UserHome()
    {
        return view('UserLanding.home_user');
    }
}
