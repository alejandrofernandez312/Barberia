<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class PruebasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/misCitas');

    //     $response->assertStatus(200);
    // }
    

    public function test_trabajos()
    {
        $this->get('/trabajos')->assertStatus(200);
    }

}
