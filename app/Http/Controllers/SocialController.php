<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;

class SocialController extends Controller
{
    function get() {
        $data = Social::get();
        return response()->json($data);
    }
    function create(Request $request) {
        $model = new Social();
        $data = $request->all();
        $response = $model->create($data);
        return response()->json($response);
    }
    function edit($id, Request $request) {
        $model = Social::find($id);
        $data = $request->all();
        $model->update($data);
        return response()->json($model);
    }
    function delete($id) {
        Social::find($id)->delete();
        return response('ok', 200);
    }
}
