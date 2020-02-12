<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class CommentsController extends Controller
{
    function create(Request $request) {
        $model = new Comments();
        $data = $request->all();
        $response = $model->create($data);
        return response()->json($response);
    }
}
