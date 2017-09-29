<?php

namespace App\Models;

use App\Models\Rack;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'posX', 'posY', 'name'
    ];

    public function rack()
    {
        return $this->hasOne(Rack::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
