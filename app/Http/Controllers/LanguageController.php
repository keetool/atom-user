<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\KeywordLanguage;
use App\Keyword;
use App\Repositories\LanguageRepository;
use App\Repositories\KeywordRepository;
use App\Repositories\KeywordLanguageRepository;

class LanguageController extends Controller
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

    /**
     * list of languages
     * /t/language/list
     * @method GET
     * @return view
     */
    public function listLanguages()
    {
        return view("language.languages", [
            "languages" => $this->languageRepository->queryAllOrderBy("created_at", "desc"),
            "keywords" => $this->keywordRepository->queryAllOrderBy("name")
        ]);
    }

    /**
     * Return view edit language
     * /t/language/{lang_id}/edit
     * @method GET
     * @return view
     */
    public function getEditLanguage($id)
    {
        $data = [
            "language" => $this->languageRepository->show($id)
        ];
        return view("language.add", $data);
    }


    /**
     * show add language page
     * /t/language/add
     * @method GET
     * @return view
     */
    public function getAddLanguage()
    {
        return view("language.add");
    }

    /**
     * Create language
     * /t/language
     * @method POST
     * @param [string] name
     * @param [string] code
     */
    public function postAddLanguage(Request $request)
    {
        $data = $request->only(["name", "codes"]);
        $data['version'] = time();
        $id = $request->id;
        if ($id) {
            $this->languageRepository->update($data, $id);
        } else {
            $lang = $this->languageRepository->create($data);
            $keywords = $this->keywordRepository->all();
            foreach ($keywords as $keyword) {
                $this->keywordLanguageRepository->create([
                    "language_id" => $lang->id,
                    "keyword_id" => $keyword->id,
                    "content" => ""
                ]);
            }
        }
        return redirect("/t/language/list");
    }

    /**
     * Language detail page
     * /t/language/{lang_id}
     * @method GET
     * @return view
     */
    public function getLanguageDetail($id)
    {
        $language = $this->languageRepository->show($id);
        $keywords = $language->keywords;

        return view("language.language_detail", [
            "keywords" => $keywords,
            "language" => $language
        ]);
    }

    /**
     * Show page edit keyword
     * /t/language/{lang_id}/keyword/{keyword}
     * @method GET
     * @return view
     */
    public function getKeywordEdit($lang_id, $keyword_id)
    {
        $keywordLanguage = $this->keywordLanguageRepository->findByKeywordIdAndLanguageId($keyword_id, $lang_id);
        $keyword = $this->keywordRepository->show($keyword_id);

        return view("language.keyword_edit", [
            "keyword_language" => $keywordLanguage,
            "lang_id" => $lang_id,
            "keyword" => $keyword
        ]);
    }

    public function getKeywordAdd($lang_id)
    {
        return view("language.keyword_edit", [
            "lang_id" => $lang_id
        ]);
    }

    public function postKeyword($lang_id, Request $request)
    {
        $content = $request->content;
        $name = $request->name;

        // update the language version
        $lang = Language::find($lang_id);
        $lang->version = time();
        $lang->save();

        $keyword = Keyword::where("name", $name)->first();
        if ($keyword == null) {
            $keyword = Keyword::create([
                "name" => $name
            ]);
            $otherLanguages = Language::where("id", "!=", $lang_id)->get();
            foreach ($otherLanguages as $lang) {
                $keywordLanguage = new KeywordLanguage();
                $keywordLanguage->language_id = $lang->id;
                $keywordLanguage->keyword_id = $keyword->id;
                $keywordLanguage->content = "";
                $keywordLanguage->save();
            }
        }
        $keywordLanguage = KeywordLanguage::where("language_id", $lang_id)->where("keyword_id", $keyword->id)->first();
        if ($keywordLanguage == null) {
            $keywordLanguage = new KeywordLanguage();
        }

        $keywordLanguage->language_id = $lang_id;
        $keywordLanguage->keyword_id = $keyword->id;
        $keywordLanguage->content = $content;
        $keywordLanguage->save();


        return redirect("/t/language/list");
    }

    /**
     * Return page add keyword without language id
     * @method GET
     * @return view
     */
    public function getKeywordAddOnly()
    {
        return view("language.add_keyword");
    }

    public function getKeywordEditOnly($id)
    {
        $keyword = Keyword::find($id);
        return view("language.add_keyword", [
            "keyword" => $keyword
        ]);
    }

    /**
     * Add keyword
     * @param [string] name
     */
    public function postAddKeyword(Request $request)
    {
        if ($request->id == null) {
            $keyword = Keyword::where("name", $request->name)->first();
            if ($keyword == null) {
                $keyword = Keyword::create($request->all());
                $langs = Language::all();
                foreach ($langs as $lang) {
                    $keywordLanguage = new KeywordLanguage();
                    $keywordLanguage->language_id = $lang->id;
                    $keywordLanguage->keyword_id = $keyword->id;
                    $keywordLanguage->content = "";
                    $keywordLanguage->save();
                }
            }
        } else {
            $keyword = Keyword::find($request->id);
            $keyword->name = $request->name;
            $keyword->save();
        }

        return redirect("/t/language/list");
    }
}
