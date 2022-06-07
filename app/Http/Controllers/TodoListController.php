<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Route working successfully'
        ],Response::HTTP_ACCEPTED);
    }

    public function test()
    {
        return response(
            [
                "list" => "this is a list boys"
            ]
        );
    }

}
