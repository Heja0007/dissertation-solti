<?php

namespace App\Repositories;

use App\Repositories\Traits\CrudRepositoryTrait;
use App\TrekkingRoute;
use App\Upload;
use Carbon\Carbon;

class UploadRepository
{

    use CrudRepositoryTrait;

    public function __construct(Upload $model)
    {
        $this->model = $model;
    }

    public function verifyUpload($request, $fileType)
    {
        $image = $request->file($fileType);
        $check = $image->getClientOriginalExtension();
        if ($check == 'jpg' || $check == 'png' || $check == 'jpeg' || $check == 'JPG' || $check == 'PNG' || $check == 'JPEG') {
            return 1;
        }
        return 0;
    }

    public function upload($request, $fileType)
    {
        $image = $request->file($fileType);
        $imageName = $image->getClientOriginalName();
        $imagePath = storage_path('/' . $fileType);
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        $imageName = '/' . $fileType . '/' . Carbon::now()->format('Y-m-d-h-s') . '-' . $imageName;
        $image->move($imagePath, $imageName);
        return $imageName;
    }

    public function verifyUploads($request)
    {
        $uploads = $request->file('uploads');
        $allowedfileExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
        foreach ($uploads as $upload) {
            $extension = $upload->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                return 1;
            }
            return 0;
        }
    }

    public function storeUploads($request, $id)
    {
        $uploads = $request->file('uploads');
        foreach ($uploads as $upload) {
            $originalFilename = $upload->getClientOriginalName();
            $filePath = storage_path('/uploads');
            if (!is_dir($filePath)) {
                mkdir($filePath, 0755, true);
            }
            $filename = '/uploads/' . Carbon::now()->format('Y-m-d-h-s') . '-' . $originalFilename;
            $upload->move($filePath, $filename);
            Upload::create([
                'routes_id' => $id,
                'filename' => $filename,
                'originalFileName' => $originalFilename
            ]);
        }
    }
}
