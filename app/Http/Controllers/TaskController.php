<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index(TodoList $todo_list)
    {
        $task = $todo_list->tasks;
//        $task = Task::where(['todo_list_id' => $todo_list->id])->get();
        return response($task);
    }

    public function store(Request $request, TodoList $todo_list)
    {
        $task = $todo_list->tasks()->create($request->all());
//        $request['todo_list_id'] = $todo_list->id;
//        $task = Task::create($request->all());
        return response($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response($task,Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response($task,Response::HTTP_OK);
    }

}
