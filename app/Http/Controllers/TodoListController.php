<?php

namespace App\Http\Controllers;

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

    public function test()
    {
        return response
        (
            [
                "list" => "this is a list boys"
            ]
        );
    }

    public function show(TodoList $todo_list)
    {
//        $list = TodoList::findOrFail($id);
        return response($todo_list);
    }

    public function store(Request $request)
    {

        $list = TodoList::create($request->all());
        return $list;
    }
}
