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

    public function testGetLanguageDetail()
    {
        $response = $this->get("/t/language/" . $this->language->id);
        $response->assertStatus(200);
        $response->assertViewIs("language.language_detail");
        $response->assertViewHasAll(["language"]);
    }

    public function testGetEditLanguage()
    {
        $response = $this->get("/t/language/" .  $this->language->id . "/edit");
        $response->assertStatus(200);   
    }

    public function testGetKeyWord()
    {
        $response = $this->get("/t/language/" .  $this->language->id . "/keyword");
        $response->assertStatus(200);   
        $response->assertViewIs("language.keyword_edit");        
    }

    public function testGetKeyWordEdit()
    {
        $response = $this->get("/t/language/" .  $this->language->id . "/keyword/". $this->keyword->id);
        $response->assertStatus(200);   
        $response->assertViewIs("language.keyword_edit");        
    }
}
