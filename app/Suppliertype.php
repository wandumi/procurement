<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliertype extends Model
{
    protected  $fillable = ['name','description'];

    public function Rfqs()
    {
        return $this->hasMany(Rfqs::class);
    }
    
}
