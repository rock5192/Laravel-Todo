<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {


//        $lists = TodoList::whereUserId(Auth::id())->get();
//        OR
        $lists = auth()->user()->todo_lists;
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


//        return Auth::user()->todo_lists()->create($request->all());
        //OR

        return auth()->user()->todo_lists()->create($request->validated());
//        $list = TodoList::create([
//            'name' => $request->name,
//            'user_id' => Auth::id()
//        ]);
//        return $list;
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
