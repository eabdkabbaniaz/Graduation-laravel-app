<?php

namespace Modules\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadServiceTrait
{


   /* public static function uploadFile(UploadedFile $file, string $folder): string
    {

        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path($folder); 
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $file->move($destinationPath, $filename);
        return asset($folder . '/' . $filename);
    }*/
    public static function uploadFile(UploadedFile $file, string $folder): string
{
    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs($folder, $filename, 'public'); 
    return asset('storage/' . $path);
}

}
