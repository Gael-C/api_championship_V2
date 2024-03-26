<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classment extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function team()
    {
        return $this->belongsTo(Team::class)->select('id', 'name','slug');
    }

    public function league()
    {
        return $this->belongsTo(League::class)->select('id', 'name','slug');
    }
}
