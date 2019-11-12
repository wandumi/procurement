<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfqstatus extends Model
{
    public function Rfqs()
    {
        return $this->belongsTo(Rfq::class);
    }
}
