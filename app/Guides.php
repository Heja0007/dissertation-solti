<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guides extends Model
{
    protected $table = 'guides';

    protected $fillable = [
        'name', 'phone', 'photo', 'expertise', 'email', 'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}
