<?php

namespace Tests;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

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

    public function createTask()
    {
        return Task::factory()->create();
    }
}
