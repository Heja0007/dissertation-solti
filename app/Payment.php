<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'payer_id', 'amount', 'prn', 'unique_id', 'payment_type', 'status', 'verification_code','unique_verifier_code'
    ];

    public function payer()
    {
        return $this->belongsTo('App\BookingDetails', 'payer_id');
    }
}

