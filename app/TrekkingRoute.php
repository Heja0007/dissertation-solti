<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrekkingRoute extends Model
{
    protected $table = 'trekking_routes';

    protected $fillable = [
        'name', 'cost', 'duration', 'difficulty', 'maximum_altitude', 'description', 'itinerary', 'cost_details', 'start_date', 'status', 'type' ,'destination'
    ];

    protected $primaryKey = "id";

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }


}
