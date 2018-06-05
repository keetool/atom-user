<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Language as LanguageResource;
use App\Http\Controllers\ApiController;
use App\Language;

class LanguageApiController extends ApiController
{
    /**
     * GET /api/v1/languages
     * @method GET
     * @return view
     */
    public function language(Request $request)
    {
        $code = $request->encode;
        $version = $request->version;

        if ($code == null) {
            $code = "en_us";
        }

        $language = Language::where("codes", "like", "%" . $code . "%")->first();
        if ($language == null) {
            return $this->notFound([
                "message" => "language not existed"
            ]);
        }
        if ($version == $language->version) {
            return $this->notModified();
        } else {
            return new LanguageResource($language);
        }

    }
}
