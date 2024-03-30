<?php

namespace App\Http\Controllers;

use Monolog\Level;
use App\Models\Team;
use Inertia\Inertia;
use App\Models\League;
use App\Models\MatchWeek;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leagues = League::all()->where('id', '!==', 8);
        return Inertia::render('League/List', ['leagues' => $leagues]);
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
        $league = League::where('slug', $slug)->firstOrFail()->load('teams', 'classment');
        $teams = Team::all();
        $matchweeks = MatchWeek::all()->load('matches');



        return Inertia::render('League/Show', [
            'league' => $league,
            'teams' => $teams,
            'matchWeeks' => $matchweeks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(League $league)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, League $league)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(League $league)
    {
        //
    }
}
