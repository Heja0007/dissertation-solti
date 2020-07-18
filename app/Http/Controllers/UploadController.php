<?php

namespace App\Http\Controllers;

use App\Repositories\UploadRepository;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public $model;

    public function  __construct(UploadRepository $model)
    {
        $this->model = $model;
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->back();
    }
}
