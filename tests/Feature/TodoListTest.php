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
    public function test_fetch_all_todo_list()
    {


        //preparation //prepare

//        TodoList::create(['name' => 'my list']);
        $lists = TodoList::factory()->count(2)->create(['name' => 'my List']);




        //action //perform
        $response = $this->getJson(route('todo-list.store'));



        //assertion //predict
        $this->assertEquals(2,count($response->json()));
        $this->assertEquals('my List',$response->json()[0]['name']);
//         dd($response->json()[0]['name']);


    }

    public function test_fetch_single_todo_list()
    {
        //preparation
        $list = TodoList::factory()->create();


        //action
        $response = $this->getJson(route('todo-list.show',$list->id))
            ->assertOk()
            ->json();



        //assertion
//        $response->assertStatus(200);
//        $response->assertOk();
        $this->assertEquals($list->name,$response['name']);
    }
}
