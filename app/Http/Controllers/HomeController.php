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
    public $lang;

    public function __construct(LanguageRepository $languageRepo, KeywordRepository $keywordRepo, KeywordLanguageRepository $keywordLanguageRepo, Request $request)
    {
        $this->languageRepo = $languageRepo;
        $this->keywordRepo = $keywordRepo;
        $this->keywordLanguageRepo = $keywordLanguageRepo;
        /*Multi Lang
        $this->lang = \Request::get("lang");
        */
    }

    public function index(Request $request)
    {
        /* Multi Lang
        if($this->lang){
            $code = $this->lang;
        }else{
            $code = $request->session()->get("lang");
        }
        */
        $code = $request->lang;
        if($code){
            $code = "en-us";
        }
        $language = $this->languageRepo->findByCode($code);
        $keywords = $this->keywordRepo->getAllKeyWord();
        $data = [];
        foreach ($keywords as $keyword) {
            $data[$keyword->name] = $this->keywordLanguageRepo->findByKeywordIdAndLanguageId($keyword->id, $language->id)->toArray();
        }
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
