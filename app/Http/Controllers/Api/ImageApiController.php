<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ImageResource;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\MerchantInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageApiController extends ApiController
{
    protected $imageRepository;
    protected $merchantRepository;

    public function __construct(
        ImageRepositoryInterface $imageRepository,
        MerchantInterface $merchantRepository
    )
    {
        parent::__construct();
        $this->imageRepository = $imageRepository;
        $this->merchantRepository = $merchantRepository;
    }

    /**
     * Upload Image
     * Param: image
     * @param Request $request
     * @return ImageResource
     */
    public function createImage($subDomain, Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();

            $s3 = Storage::disk('s3');
            $filePath = 'images/' . $imageFileName;

            $s3Path = "production/" . $filePath;

            $s3->put($s3Path, file_get_contents($image), 'public');

            $url = Storage::disk('s3')->url($filePath);

            $user = Auth::user();

            $merchant = $this->merchantRepository->findBySubDomain($subDomain);

            $image = $this->imageRepository->create([
                "path" => $s3Path,
                "url" => $url,
                "user_id" => $user->id,
                "merchant_id" => $merchant->id
            ]);
        }

        return new ImageResource($image);
    }
}
