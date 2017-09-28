<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Robot;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'posX', 'posY', 'robot_id', 'name'
    ];

    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
