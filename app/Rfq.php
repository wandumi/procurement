<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rfqresponse;
use App\User;

class Rfq extends Model
{

    protected $dates = ['created_at', 'updated_at', 'closing_date_time','open_date_time'];


    /********* Start of the the relationships ******/
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function rfqresponses()
    {
        return $this->hasMany(Rfqresponse::class);
    }

    public function PCategories()
    {
        return $this->belongsTo(Pcategory::class);
    }

    public function RequestTypes()
    {
        return $this->belongsTo(Requesttype::class);
    }

    public function SupplierTypes()
    {
        return $this->belongsTo(Suppliertype::class);
    }
    /********* end of the the relationships ******/

    // public function getstatusAttribute($attribute)
    // {
    //     return [
    //         1 => 'Published',
    //         2 => 'Pending',
    //         3 => 'Draft'
    //     ][$attribute];
    // }

    //Accessing the date from the database 
    public function getOpenDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)
        ->format(config('app.date_format'));
    }

    public function getClosingDateAttribute($input)
    {
        return Carbon::createFromFormat('Y-m-d', $input)
        ->format(config('app.date_format'));
    }

    
}
