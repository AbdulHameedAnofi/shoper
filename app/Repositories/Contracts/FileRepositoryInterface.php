<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\UploadedFile;

interface FileRepositoryInterface {
    public function create(UploadedFile $file);
    public function find(string $uuid);
}