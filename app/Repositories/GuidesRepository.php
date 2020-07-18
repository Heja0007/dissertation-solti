<?php

namespace App\Repositories;

use App\Guides;
use App\Repositories\Traits\CrudRepositoryTrait;
use Carbon\Carbon;

class GuidesRepository
{

    use CrudRepositoryTrait;

    public $model;

    public function __construct(Guides $model)
    {
        $this->model = $model;
    }


}
