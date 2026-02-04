<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    //
    protected $guarded = [];
    
public function breaktime()
    {
        return $this->hasMany(Stock::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
