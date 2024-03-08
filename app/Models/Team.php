<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
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

    public function leagues()
    {
        return $this->belongsToMany(League::class)->withTimestamps() ;
    }

    public function classment()
    {
        return $this->hasMany(Classment::class,'team_id','id');
    }

    public function mostSuccesfull()
    {
        return $this->hasOne(League::class);
    }

    public function lastChampion()
    {
        return $this->hasOne(League::class,);
    }
}
