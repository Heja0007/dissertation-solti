<?php

namespace App\Repositories;

use App\BookingDetails;
use App\Repositories\Traits\CrudRepositoryTrait;

class BookingDetailsRepository
{

    use CrudRepositoryTrait;

    public $model;

    public function __construct(BookingDetails $model)
    {
        $this->model = $model;
    }
}
