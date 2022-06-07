<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
       //preparation



        //action
        $response = $this->getJson(route('test'));
  


        //assertion
        $this->assertEquals(1,count($response->json()));
    }
}
