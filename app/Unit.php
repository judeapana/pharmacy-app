<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
