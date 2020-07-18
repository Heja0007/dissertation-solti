<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    protected $table = 'booking_details';

    protected $fillable = [
        'name', 'routes_id', 'total people', 'email', 'phone', 'prefered_date', 'status' , 'cost'
    ];

    public function trekRoutes()
    {
        $this->hasOne('App\TrekkingRoute', 'routes_id');
    }

}

