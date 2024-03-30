<?php

namespace App\Http\Controllers;

use App\Models\MatchWeek;
use Illuminate\Http\Request;

class MatchWeekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matchWeek = MatchWeek::all()->load('matches');

        return $matchWeek;
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
    public function show(MatchWeek $matchWeek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatchWeek $matchWeek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MatchWeek $matchWeek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatchWeek $matchWeek)
    {
        //
    }
}
