<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use App\Repositories\LanguageRepository;
use App\Repositories\KeywordRepository;
use App\Repositories\KeywordLanguageRepository;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
{
    protected $languageRepo;
    protected $keywordRepo;
    protected $keywordLanguageRepo;
    public $code;

    public function __construct(LanguageRepository $languageRepo, KeywordRepository $keywordRepo, KeywordLanguageRepository $keywordLanguageRepo, Request $request)
    {
        parent::__construct();
        $this->languageRepo = $languageRepo;
        $this->keywordRepo = $keywordRepo;
        $this->keywordLanguageRepo = $keywordLanguageRepo;
    }

    public function index(Request $request)
    {
        // dd($this->code);
        $language = $this->languageRepo->findByCode($this->lang);
        $keywords = $this->keywordRepo->getAllKeyWord();
        $data = [];
        foreach ($keywords as $keyword) {
            $data[$keyword->name] = $this->keywordLanguageRepo->findByKeywordIdAndLanguageId($keyword->id, $language->id)->toArray();
        }
        // dd($data);
        $this->data['keyword'] = $data;
        return view("home.index", $this->data);
    }

    public function blogs()
    {
        return view("home.blogs", $this->data);
    }

    public function register()
    {
        return view("home.merchant_register", $this->data);
    }

    public function checkMerchant()
    {
        return view("home.check_merchant", $this->data);
    }

    public function dummy()
    {
        return view('home.dummy', $this->data);
    }

    public function dummy2()
    {
        return view('home.dummy2', $this->data);
    }
}
