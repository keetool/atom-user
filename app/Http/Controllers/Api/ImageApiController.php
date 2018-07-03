<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class ImageApiController extends ApiController
{


    /**
     * Param: image
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();

            $s3 = Storage::disk('s3');
            $filePath = 'images/' . $imageFileName;
            $s3->put("production/" . $filePath, file_get_contents($image), 'public');
        }

        return $this->success([
            "url" => Storage::disk('s3')->url($filePath)
        ]);
    }
}
