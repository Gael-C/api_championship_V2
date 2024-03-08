<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'league_team')->select('team_id', 'name');
    }

    public function classment()
    {
        return $this->hasMany(Classment::class)->orderBy('classement');
    }

    public function matches()
    {
        return $this->hasMany(Matchs::class);
    }

    public function mostSuccesfull()
    {
        return $this->belongsTo(Team::class, 'most_successfull', 'id')->select('id', 'name');
    }

    public function lastChampion()
    {
        return $this->belongsTo(Team::class, 'last_champion', 'id')->select('id', 'name');
    }
}
