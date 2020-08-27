<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    protected $table = 'booking_details';

    protected $fillable = [
        'name', 'routes_id', 'peoples', 'email', 'phone', 'prefered_date', 'status', 'cost'
    ];

    public function payment()
    {
        return $this->hasOne('App\Payment', 'booking_id');
    }

    public function trek()
    {
        return $this->belongsTo('App\TrekkingRoute', 'routes_id');
    }

}

