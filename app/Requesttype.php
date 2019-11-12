<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requesttype extends Model
{
    protected $fillable = ['name','description'];

    public function Rfqs()
    {
        return $this->hasMany(Rfqs::class);
    }
}
