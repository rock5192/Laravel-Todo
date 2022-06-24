<?php

namespace Tests;

use App\Models\Task;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function createTodoList()
    {
        return TodoList::factory()->create(['name' => 'my List']);
    }

    public function createTask($args = [])
    {
        return Task::factory()->create($args);
    }

    public function createUser($args = [])
    {
        return User::factory()->create();
    }

    public function authUser($args = [])
    {
        Sanctum::actingAs($this->createUser());
    }


}
