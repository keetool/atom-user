<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Language;
use App\Keyword;
use App\KeywordLanguage;



class LanguageTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    protected $language;
    protected $keyword;
    protected $keyword_language;

    public function setUp(){
        parent::setUp();
        $this->language = factory(Language::class)->create();
        $this->keyword = factory(Keyword::class)->create();
        $this->keyword_language = factory(KeywordLanguage::class)->create();
    }

    /**
     * GET /t/language
     */
    public function testListLanguages()
    {
        $response = $this->get("/t/language/list");
        $response->assertStatus(200);
        $response->assertViewIs("language.languages");
    }

    /**
     * GET /t/language/add
     */
    public function testViewAddLanguage()
    {
        $response = $this->get("/t/language/add");
        $response->assertStatus(200);
        $response->assertViewIs("language.add");
    }
    /**
     * POST /t/language
     */
    public function testPostAddLanguage()
    {
        $response = $this->json("POST", "/t/language", [
            "name" => "test1",
            "codes" => "test2",
        ]);
        $this->assertDatabaseHas('languages', [
            'name' => 'test1',
            "codes" => "test2"
        ]);
        $response->assertRedirect("/t/language/list");
    }

    /**
     * GET /t/language/lang_id
     */
    public function testGetLanguageDetail()
    {
        $response = $this->get("/t/language/" . $this->language->id);
        $response->assertStatus(200);
        $response->assertViewIs("language.language_detail");
        $response->assertViewHasAll(["language"]);
    }

    /**
     * GET /t/language/lang_id/edit
     */
    public function testGetEditLanguage()
    {
        $response = $this->get("/t/language/" .  $this->language->id . "/edit");
        $response->assertStatus(200);   
    }
    /**
     * GET /t/language/lang_id/keyword
     */
    public function testGetKeyWord()
    {
        $response = $this->get("/t/language/" .  $this->language->id . "/keyword");
        $response->assertStatus(200);   
        $response->assertViewIs("language.keyword_edit");        
    }
    /**
     * GET /t/language/lang_id/keyword/keyword_id
     */
    public function testGetKeyWordEdit()
    {
        $response = $this->get("/t/language/" .  $this->language->id . "/keyword/". $this->keyword->id);
        $response->assertStatus(200);   
        $response->assertViewIs("language.keyword_edit");        
    }

    /**
     * POST /t/language/lang_id/keyword
     */
    public function testPostKeyword()
    {
        $response = $this->json("POST", "/t/language/".  $this->language->id ."/keyword" , [
            "name" => "keyword_name",
        ]);
        $this->assertDatabaseHas('keywords', [
            'name' => 'keyword_name',
        ]);
        $response->assertRedirect("/t/language/list");
        $response->assertStatus(200);   
    }
    /**
     * GET /t/language/keyword/add
     */
    public function testGetKeywordAddOnly()
    {
        $response = $this->get("/t/language/keyword/add");
        $response->assertViewIs("language.add_keyword");
    }

    /**
     * GET /t/language/keyword/keyword_id/edit
     */
    public function testGetKeywordEditOnly()
    {
        $response = $this->get("/t/language/keyword/". $this->keyword->id ."/edit");
        $response->assertViewIs("language.add_keyword");    
        $response->assertViewHas("keyword");
    }
    

    /**
     * POST /t/language/keyword
     */
    public function testPostAddKeyWord()
    {
        
        $response = $this->json("POST", "/t/language/keyword", [
            "name" => $this->keyword_language->content,
            "id" => $this->keyword_language->keyword_id,            
        ]);
        $response->assertRedirect("/t/language/list");
        $this->assertDatabaseHas('keyword_language', [
            'language_id' => $this->keyword_language->language_id,
            'keyword_id' => $this->keyword_language->keyword_id,
            'content' => $this->keyword_language->content,
        ]);
    }
}
