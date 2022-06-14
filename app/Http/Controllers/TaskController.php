<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return response($task);
    }

    public function store(Request $request)
    {
        Task::create($request->all());
        return response(['stored']);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response('',Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, Task $task)
    {

        $task->update($request->all());
        return response($task,Response::HTTP_OK);
    }

}
