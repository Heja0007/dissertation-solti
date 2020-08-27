<?php

namespace App\Helpers;


use App\BookingDetails;
use App\Guides;
use App\TrekkingRoute;
use App\Upload;

class DashboardHelper
{

    public function allTreks()
    {
        $treks = TrekkingRoute::active()->count();
        return $treks;
    }

    public function allGuides()
    {
        $guides = Guides::active()->count();
        return $guides;
    }

    public function bookings()
    {
        $guides = BookingDetails::count();
        return $guides;
    }

}
