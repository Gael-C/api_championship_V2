<?php

namespace App\Http\Controllers;

use App\Models\MatchWeek;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all()->load('leagues', 'classment');
        return Inertia::render('Team/List', ['teams' => $teams]);
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
    public function show(String $slug)
    {
        $teams = Team::all();
        $team = Team::where('slug',$slug)->firstOrFail()->load('leagues', 'classment');
        $matchweeks = MatchWeek::all()->load('matches');
        return Inertia::render('Team/Show', [
            'team' => $team,
            'teams' => $teams,
            'matchWeeks' =>$matchweeks
            ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
