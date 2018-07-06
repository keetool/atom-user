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
        $response = $this->get('/');

        $response->assertStatus(200);
     }

  
}
