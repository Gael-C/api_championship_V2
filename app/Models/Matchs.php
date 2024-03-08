<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchs extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function homeTeam() {
        return $this->belongsTo(Team::class)->select('id', 'name');
    }

    public function awayTeam() {
        return $this->belongsTo(Team::class)->select('id', 'name');
    }

    public function league(){
        return $this->belongsTo(League::class)->select('id', 'name');
    }

    public function matchWeeks() {
        return $this->belongsToMany(MatchWeek::class)->select('matches_id', 'match_week_number', 'seasons_id');
    }
}
