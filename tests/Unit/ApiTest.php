<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class api extends TestCase
{
    /**
     * Test Post login
     * /login
     */
    public function testPostMarchant()
    {
        $response = $this->json("POST", "/login", [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $response->assertStatus(401);
     }

    /**
     * Test Post checkMerchant
     * check/merchant
     */
    // public function postMarchant()
    // {
    //     $response = $this->json("POST", "/t/language", [
    //         "name" => "test1",
    //         "codes" => "test2",
    //     ]);

    // }
    
}
