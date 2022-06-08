<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $list;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->list = TodoList::factory()->create(['name' => 'my List']);
    }

    public function test_fetch_all_todo_list()
    {


        //preparation //prepare

//        TodoList::create(['name' => 'my list']);
//        $lists = TodoList::factory()->count(2)->create(['name' => 'my List']);

        //action //perform
        $response = $this->getJson(route('todo-list.index'));

        //assertion //predict
        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('my List', $response->json()[0]['name']);
    }

    public function test_fetch_single_todo_list()
    {
        //preparation
//        $list = TodoList::factory()->create();

        //action
        $response = $this->getJson(route('todo-list.show', $this->list->id))
            ->assertOk()
            ->json();

        //assertion

        $this->assertEquals($this->list->name, $response['name']);
    }

    public function test_store_new_todo_list()
    {
        //preparation
        $list = TodoList::factory()->make();


        //action
        $response = $this->postJson(route('todo-list.store'),['name' => $list->name])
            ->assertCreated()
            ->json();

        //assertion
        $this->assertDatabaseHas('todo_lists',['name' => $list->name]);
        $this->assertEquals($list->name,$response['name']);


    }
}








//Responses
//$response->assertStatus(200);
//$response->assertOk();
//$this->assertEquals($this->list->name,$response['name']);
//dd($response->json()[0]['name']);
//dd($response['name']);
