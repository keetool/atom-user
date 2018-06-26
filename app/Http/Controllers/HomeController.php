<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use App\Repositories\LanguageRepository;
use App\Repositories\KeywordRepository;
use App\Repositories\KeywordLanguageRepository;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    protected $languageRepo;
    protected $keywordRepo;
    protected $keywordLanguageRepo;
    public $code;

    public function __construct(LanguageRepository $languageRepo, KeywordRepository $keywordRepo, KeywordLanguageRepository $keywordLanguageRepo, Request $request)
    {
        $this->languageRepo = $languageRepo;
        $this->keywordRepo = $keywordRepo;
        $this->keywordLanguageRepo = $keywordLanguageRepo;
        $this->code = "en-us";
    }

    public function index(Request $request)
    {
        // dd($this->code);
        $language = $this->languageRepo->findByCode($this->code);
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
        return view("home.blogs");
    }

    public function register()
    {
        return view("home.merchant_register");
    }

    public function checkMerchant()
    {
        return view("home.check_merchant");
    }

    public function dummy()
    {
        return view('home.dummy');
    }

    public function dummy2()
    {
        return view('home.dummy2');
    }
}
