<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function ImageUpload($query,$id) // Taking input image as parameter
    {
        $image_name = $id;
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $image_url = $image_full_name;
        $success = $query->move(public_path('assets/image'),$image_full_name);

        return $image_url; // Just return image
    }
}
?>