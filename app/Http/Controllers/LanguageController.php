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
     * @param [string] codes
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

        return view("language.language_detail", [
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

    /**
     * Add or edit the keywordLanguage and corresponding keyword
     * @param [string] content
     * @param [string] name
     * @return redirect /t/language/list
     */
    public function postKeyword($lang_id, Request $request)
    {

        $content = $request->content;
        $name = $request->name;

        // update the language version
        $this->languageRepository->update([
            "version" => time()
        ], $lang_id);

        // Check if the keyword with given name existed in the database
        $keyword = $this->keywordRepository->findByName($name);
        if ($keyword == null) {
            $keyword = $this->keywordRepository->create([
                "name" => $name
            ]);
            $otherLanguages = Language::where("id", "!=", $lang_id)->get();
            foreach ($otherLanguages as $lang) {
                $this->keywordLanguageRepository->create([
                    "language_id" => $lang->id,
                    "keyword_id" => $keyword->id,
                    "content" => ""
                ]);
            }
        }

        // update the content of the current keyword language
        $keywordLanguage = $this->keywordLanguageRepository->findByKeywordIdAndLanguageId($keyword->id, $lang_id);

        if ($keywordLanguage == null) {
            // create new keywordLanguage if not existed
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

    /**
     * Show the keyword update page
     * @param [uuid] id
     */
    public function getKeywordEditOnly($id)
    {
        $keyword = $this->keywordRepository->show($id);
        return view("language.add_keyword", [
            "keyword" => $keyword
        ]);
    }

    /**
     * Add keyword
     * @param [string] name
     * @return redirect("/t/language/list")
     */
    public function postAddKeyword(Request $request)
    {
        if ($request->id == null) {
            // create new keyword
            $keyword = $this->keywordRepository->findByName($request->name);
            if ($keyword == null) {
                // if keyword not existed
                $keyword = $this->keywordRepository->create($request->all());
                $langs = Language::all();
                foreach ($langs as $lang) {
                    // create the keyword for all languages
                    $this->keywordLanguageRepository->create([
                        "language_id" => $lang->id,
                        "keyword_id" => $keyword->id,
                        "content" => ""
                    ]);
                }
            }
        } else {
            // update the existed keyword
            $this->keywordRepository->update([
                "name" => $request->name
            ], $request->id);
        }

        // update all languages version
        $langs = Language::all();
        foreach ($langs as $lang) {
            $this->languageRepository->update([
                "version" => time()
            ], $lang->id);
        }

        return redirect("/t/language/list");
    }
}
