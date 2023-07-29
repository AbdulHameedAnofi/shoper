<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\FileRepositoryInterface;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function __construct(private FileRepositoryInterface $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'max:2024|image|mimes:jpeg,png,jpg'
        ]);
        // return $request->file->getClientOriginalName();
        return $this->fileRepository->create($request->image);
    }
}
