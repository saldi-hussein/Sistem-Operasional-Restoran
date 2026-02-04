<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    //
    public function unit()
    {
        return $this->hasMany(Unit::class);
    }

    
}
