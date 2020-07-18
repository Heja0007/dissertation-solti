<?php

namespace App\Repositories;

use App\Payment;
use App\Repositories\Traits\CrudRepositoryTrait;

class PaymentsRepository
{

    use CrudRepositoryTrait;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }
}
