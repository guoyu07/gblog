<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

    /**
     * Icon image upload by category, just store local
     * 
     * @return JsonResponse
     */
    public function iconUpload(Request $request)
    {
        $file = $request->file('icon');
        $img = Image::make($file)->resize(50, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $filename = $file->hashName();
        $img->save(storage_path('app/public/') . $filename);


        return response()->success(['icon' => asset('storage') . '/' . $filename]);
    }
}