<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    protected $fillable = [
        'routes_id', 'filename', 'originalFileName'
    ];

    public function routes()
    {
        return $this->belongsTo('App\TrekkingRoute', 'routes_id');
    }
}
