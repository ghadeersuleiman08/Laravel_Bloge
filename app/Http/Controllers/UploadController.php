<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function upload_image(Request $request)
    {
        //upload image
        if (!File::exists(storage_path('app/public/media/authors'))) {
            File::makeDirectory(storage_path('app/public/media/authors'));
        }

        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media/authors/', $filename);

        return $filename;
    }


    public function upload_image_blog(Request $request)
    {
        //upload image
        if (!File::exists(storage_path('app/public/media/blogs'))) {
            File::makeDirectory(storage_path('app/public/media/blogs'));
        }

        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media/blogs', $filename);

        return $filename;
    }

    public function upload_image_category(Request $request)
    {
        //upload image
        if (!File::exists(storage_path('app/public/media/categories'))) {
            File::makeDirectory(storage_path('app/public/media/categories'));
        }

        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media/categories', $filename);

        return $filename;
    }
}
