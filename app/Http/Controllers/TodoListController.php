<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {
        $lists = TodoList::all();
        return response($lists);
    }

    public function show(TodoList $todo_list)
    {
//        $list = TodoList::findOrFail($id);
        return response($todo_list);
    }

    public function store(TodoListRequest $request)
    {
//        $request->validate(['name' => ['required']]);
        $list = TodoList::create($request->all());
        return $list;
    }

    public function destroy(TodoList $todo_list)
    {
        $todo_list->delete();
        return response('',Response::HTTP_NO_CONTENT);
    }

    public function update(TodoListRequest $request, TodoList $todo_list)
    {
//        $request->validate(['name' => 'required']);

        $todo_list->update($request->all());
        return response($todo_list);
    }
}
