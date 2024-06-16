<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\TipeMerek;
use App\Models\ReportHarian;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function landingpage()
    {
        return view('dashboard.landingpage.home');
    }

    public function merek()
    {
        $showTipeMerek = Merek::all();
        return view('dashboard.merek.v_merek',([
            'showTipeMerek' => $showTipeMerek
        ]));
    }

    public function tipemerek()
    {

        $ShowTipeMerek = TipeMerek::all();
        return view('dashboard.tipemerek.v_tipemerek',([
            'ShowTipeMerek' => $ShowTipeMerek
        ]));
    }

    public function laporan()
    {
        $ShowLaporan = ReportHarian::all();
        return view('dashboard.reports.v_laporan',
    [
        'ShowLaporan' => $ShowLaporan
    ]);
    }

}
