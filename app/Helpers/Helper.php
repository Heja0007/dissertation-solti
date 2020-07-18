<?php

namespace App\Helpers;


use App\Guides;
use App\TrekkingRoute;
use App\Upload;

class Helper
{

    public function firstPhoto($id)
    {
        $photo = Upload::where('routes_id', $id)->first();
        return $photo->filename;
    }

    public function allTreks()
    {
        $treks = TrekkingRoute::active()->take(6)->get();
        return $treks;
    }

    public function allGuides()
    {
        $guides = Guides::active()->take(3)->get();
        return $guides;
    }

}
