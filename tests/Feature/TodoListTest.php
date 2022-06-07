<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_todo_list()
    {


        //preparation //prepare

//        TodoList::create(['name' => 'my list']);
        $lists = TodoList::factory()->count(2)->create(['name' => 'my List']);




        //action //perform
        $response = $this->getJson(route('todo-list.store'));



        //assertion //predict
        $this->assertEquals(2,count($response->json()));
        $this->assertEquals('my List',$response->json()[0]['name']);
         dd($response->json()[0]['name']);


    }
}
