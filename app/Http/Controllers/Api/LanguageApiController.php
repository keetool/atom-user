<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Language as LanguageResource;
use App\Http\Controllers\ApiController;
use App\Language;
use App\Repositories\LanguageRepository;

class LanguageApiController extends ApiController
{
    protected $languageRepo;

    public function __construct(LanguageRepository $languageRepo)
    {
        parent::__construct();
        $this->languageRepo = $languageRepo;
    }
    /**
     * GET /api/v1/languages
     * @method GET
     * @return view
     */
    public function language(Request $request)
    {
        $code = $request->encode;
        $version = $request->version;

        $language = Language::where("codes", "like", "%" . $code . "%")->first();
        if ($language == null) {
            $language = Language::where("codes", "like", "%" . $code . "%")->first();
        }
        if ($version == $language->version) {
            return $this->notModified();
        } else {
            return new LanguageResource($language);
        }

    }
}
