<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bar_code', 'name'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
