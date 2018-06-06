<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Language;

class LanguageTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    protected $language;

    public function setUp(){
        parent::setUp();
        $this->language = factory(Language::class)->create();
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

}
