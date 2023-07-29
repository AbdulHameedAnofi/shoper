<?php

namespace App\Repositories;

use App\Models\Files;
use App\Repositories\Contracts\FileRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileRepository implements FileRepositoryInterface
{
    public function create(UploadedFile $file)
    {
        try {
            $filePath = $file->getClientOriginalName();
            // $uploadedfilepath = $file->store('s3');
            // $path = $file->storeAs('image', $filePath, 's3');
            Storage::putFile('images', $file, $filePath);
            $url = Storage::url('images/'.$filePath);
            return Files::create([
                'file_name' => $file->getClientOriginalName(),
                'path' => $url,
                'size' => $file->getSize(),
                'type' => $file->getMimeType()
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function find(string $uuid)
    {
        return Files::whereUuid($uuid)->first('path');
    }


}