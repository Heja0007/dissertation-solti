<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'amount', 'name', 'email', 'currency', 'booking_id', 'status', 'prn'
    ];

    public function booking()
    {
        return $this->belongsTo('App\BookingDetails', 'booking_id');
    }

}
