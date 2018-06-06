<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testPostApi()
    // {
        // $response = $this->withHeaders([
        //     'X-Header' => 'value'
        // ])->json('POST', '/user', ['name' => 'Sally']);

        // $response
        //     ->assertStatus(201)
        //     ->assertJson([
        //         'created' => true,
        //     ]);
    // }

    // public function testGetWithAuthentication()
    // {
    //     $user = factory(User::class)->create();

    //     $response = $this->actingAs($user)
    //         ->withSession(['foo' => 'bar'])
    //         ->get('/');
    // }

    // public function testGetWithApiAuthentication()
    // {
    //     $user = factory(User::class)->create();

    //     $response = $this->actingAs($user, 'api')
    //         ->withSession(['foo' => 'bar'])
    //         ->get('/');
    // }
}
