<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{
    public function Rfqs()
    {
        return $this->hasMany(Rfqs::class);
    }  
}
