<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\KeywordLanguage;
use App\Keyword;

class LanguageController extends Controller
{
    /**
     * Get list of languages
     * @method GET
     * @return view
     */
    public function listLanguages()
    {
        $data = [
            "languages" => Language::orderBy("created_at", "desc")->get()
        ];
        return view("language.languages", $data);
    }

    /**
     * Return view edit language
     * @method GET
     * @return view
     */
    public function getEditLanguage($id)
    {
        $data = [
            "language" => Language::find($id)
        ];
        return view("language.add", $data);
    }


    //
    public function getAddLanguage()
    {
        return view("language.add");
    }

    /**
     * Create language
     * @method POST
     * @param [string] name
     * @param [string] code
     */
    public function postAddLanguage(Request $request)
    {
        $data = $request->only(["name", "codes"]);
        $id = $request->id;
        if ($id) {
            Language::find($id)->update($data);

        } else {
           $lang =  Language::create($data);
            $keywords = Keyword::all();
            foreach ($keywords as $keyword) {
                $keywordLanguage = new KeywordLanguage();
                $keywordLanguage->language_id = $lang->id;
                $keywordLanguage->keyword_id = $keyword->id;
                $keywordLanguage->content = "";
                $keywordLanguage->save();
            }
        }


        return redirect("/t/language/list");
    }

    /**
     * Language detail page
     * @method GET
     * @return view
     */
    public function getLanguageDetail($id)
    {

        $language = Language::find($id);

        $keywords = $language->keywords;


        return view("language.language_detail", [
            "keywords" => $keywords,
            "language" => $language
        ]);
    }

    /**
     * Show page edit keyword
     * @method GET
     * @return view
     */
    public function getKeywordEdit($lang_id, $keyword_id)
    {
        $keywordLanguage = KeywordLanguage::where("language_id", $lang_id)->where("keyword_id", $keyword_id)->first();
        $keyword = Keyword::find($keyword_id);

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


        return redirect("/t/language/" . $lang_id);
    }
}
