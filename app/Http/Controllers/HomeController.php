<?php

namespace App\Http\Controllers;

use App\Repositories\KeywordLanguageRepository;
use App\Repositories\KeywordRepository;
use App\Repositories\LanguageRepository;
use App\Services\SocketService;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $languageRepo;
    protected $keywordRepo;
    protected $keywordLanguageRepo;
    protected $socketService;

    public function __construct(
        LanguageRepository $languageRepo,
        SocketService $socketService,
        KeywordRepository $keywordRepo, KeywordLanguageRepository $keywordLanguageRepo, Request $request)
    {
        parent::__construct();
        $this->languageRepo = $languageRepo;
        $this->keywordRepo = $keywordRepo;
        $this->keywordLanguageRepo = $keywordLanguageRepo;
        $this->socketService = $socketService;
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
        $this->socketService->publish("channel", "event", ["message" => "hello"]);
        return view('home.dummy2', $this->data);
    }

    public function accessDashboard(Request $request)
    {
        if ($request->subdomain) {;
            $url = $request->subdomain . "." . config("app.domain");
            $url = generate_https($url);
            $url = $url . "/manage/signin";
            return redirect()->away(generate_https($url));
        }
        return view("home.access_dashboard", $this->data);
    }
}
