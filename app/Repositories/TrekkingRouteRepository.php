<?php

namespace App\Repositories;

use App\Repositories\Traits\CrudRepositoryTrait;
use App\TrekkingRoute;

class TrekkingRouteRepository
{

    use CrudRepositoryTrait;

    public function __construct(TrekkingRoute $model)
    {
        $this->model = $model;
    }
}
