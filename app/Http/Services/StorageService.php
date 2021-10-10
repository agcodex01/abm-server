<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface StorageService
{
    /**
     * Upload image to server
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @param string $path directory where to upload image
     */
    public function uploadImage(UploadedFile $image, string $path): void;

    /**
     * Delete image from the server
     *
     * @param string $path image directory
     */
    public function deleteImage(string $path): bool | NotFoundHttpException;
}
