<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rfqresponse extends Model
{
    protected $fillable = [
        'rfq_id','user_id','product_name','description','quantity','item_cost','total_cost',
    ];

    protected $dates = ['created_at', 'updated_at', 'closing_date_time','open_date_time'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInctive($query)
    {
        return $query->where('active', 0);
    }

    public function getActiveAttribute($attribute)
    {
        return [
            0 => 'InActive',
            1 => 'Active',
        ][$attribute];
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function rfqs(){
        return $this->belongsTo(Rfq::class);
    }

   
}
