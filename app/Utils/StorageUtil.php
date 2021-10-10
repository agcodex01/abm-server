<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class StorageUtil
{
    public static function generateFileName(UploadedFile $file): string
    {
        return Str::random() . '.' . $file->getClientOriginalExtension();
    }
}
