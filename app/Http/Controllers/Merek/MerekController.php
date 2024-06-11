<?php

namespace App\Http\Controllers\Merek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.merek.c_merek');
    }


    /**
     * Display a listing of the resource.
     */
    public function editindex()
    {
        return view('dashboard.tipemerek.c_tipemerek');
    }

/**
     * Display a listing of the resource.
     */
    public function edittipe()
    {
        return view('dashboard.tipemerek.e_tipemerek');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
