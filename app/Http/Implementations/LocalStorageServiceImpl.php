<?php

namespace App\Http\Implementations;

use App\Http\Services\StorageService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LocalStorageServiceImpl implements StorageService
{

    public function uploadImage(UploadedFile $file, string $path): void
    {
        Image::make($file)->fit(200, 200)->save(public_path($path));
    }

    public function deleteImage(string $path): bool | NotFoundHttpException
    {
        if (Storage::exists($path)) {
            return Storage::delete($path);
        }

        throw new NotFoundHttpException('Image not found.');
    }
}
