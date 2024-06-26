<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchWeek extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }

    public function matches()
    {
        return $this->belongsToMany(Matchs::class)->with('awayTeam', 'homeTeam');
    }
}
