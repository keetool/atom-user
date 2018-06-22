<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class HomeController extends Controller
{
    protected $languageRepository;
    protected $keywordRepository;
    protected $keywordLanguageRepository;

    public function __construct(
        KeywordRepository $keywordRepository,
        KeywordLanguageRepository $keywordLanguageRepository,
        LanguageRepository $languageRepository
    ) {
        $this->languageRepository = $languageRepository;
        $this->keywordRepository = $keywordRepository;
        $this->keywordLanguageRepository = $keywordLanguageRepository;
    }

    public function index(Request $request)
    {

        return view("home.index");
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
