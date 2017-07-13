<?php

namespace Tests\Unit;

use Curl\Curl;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppTest extends TestCase
{
    public function testContentTypeApi()
    {
        $curl  = new Curl();
        $curl->get(env('API_URL'));

        $res = get_headers(env('API_URL'), 1)["Content-Type"];

        $this->assertEquals('application/json;charset=UTF-8',$res);
    }
}
