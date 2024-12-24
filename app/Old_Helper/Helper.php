<?php


use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Notification as notifica;


function uploadImage($file, $directory, $oldFilePath = null)
{
    if (!$file) {
        return $oldFilePath; 
    }

    if ($oldFilePath && File::exists(public_path($oldFilePath))) {
        File::delete(public_path($oldFilePath));
    }
    $filename = time() . '_' . $file->getClientOriginalName();
    $filePath = $directory . '/' . $filename;

    // Move the uploaded file to the specified directory
    $file->move(public_path($directory), $filename);

    return $filePath;
}

