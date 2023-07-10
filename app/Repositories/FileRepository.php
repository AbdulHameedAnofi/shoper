<?php

namespace App\Repositories;

use App\Models\Files;
use App\Repositories\Contracts\FileRepositoryInterface;
use Illuminate\Http\UploadedFile;

class FileRepository implements FileRepositoryInterface
{
    public function create(UploadedFile $file)
    {
        $uploadedfilepath = $file->store('s3');
        return Files::create([
            'file_name' => $file->getClientOriginalName(),
            'path' => $uploadedfilepath,
            'size' => $file->getSize(),
            'type' => $file->getMimeType()
        ]);
    }

    public function find(string $uuid)
    {
        return Files::whereUuid('item_uuid')->first('path');
    }


}