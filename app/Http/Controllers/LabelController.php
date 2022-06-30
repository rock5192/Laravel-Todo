<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LabelController extends Controller
{

    public function index()
    {
        $label = auth()->user()->labels;
        return response($label);
    }
    public function store(LabelRequest $request)
    {
        $label = auth()->user()->labels()->create($request->all());

        return($label);
    }

    public function update(Label $label, Request $request)
    {
        $result = $label->update($request->all());
        return response($label,Response::HTTP_OK);
    }

    public function destroy(Label $label)
    {
        $label->delete();
        return response([''],Response::HTTP_NO_CONTENT);
    }

}
