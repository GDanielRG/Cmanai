<?php

namespace App\Models;

use App\Models\Robot;
use App\Models\Rack;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'rack_id', 'product_id'
    ];

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }
    
    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }
}
