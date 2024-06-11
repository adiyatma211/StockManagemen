<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function landingpage()
    {
        return view('dashboard.landingpage.home');
    }

    public function merek()
    {
        return view('dashboard.merek.v_merek');
    }

    public function tipemerek()
    {
        return view('dashboard.tipemerek.v_tipemerek');
    }

    public function laporan()
    {
        return view('dashboard.reports.v_laporan');
    }

}
