<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {


        //preparation //prepare



        //action //perform
        $response = $this->getJson(route('todo-list.store'));


        //assertion //predict
        $this->assertEquals(1,count($response->json()));


    }
}
