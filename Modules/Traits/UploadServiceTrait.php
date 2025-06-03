<?php
namespace Modules\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadServiceTrait
{
   
    
    public static function uploadFile(UploadedFile $file, string $folder): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, 'public'); // storage/app/public/{folder}/filename
    }
}
