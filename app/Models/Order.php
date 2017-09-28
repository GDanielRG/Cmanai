<?php

namespace App\Models;

use App\Models\Robot;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'robot_id', 'type', 'payload'
    ];

    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }
}
