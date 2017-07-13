<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppTest extends TestCase
{
    public function testMainPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function testApiGet_currencies()
    {
        $response = $this->get('/get_currencies');
        $response->assertStatus(200);
    }
    public function testApiLoad_currencies()
    {
        $response = $this->get('/load_currencies');
        $response->assertStatus(200);
    }
    public function testApiFast_load_currencies()
    {
        $response = $this->get('/fast_load_currencies');
        $response->assertStatus(200);
    }
}