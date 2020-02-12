<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transliterate;
use App\Tags;

class TagController extends Controller
{
    function get() {
        $data = Tags::get();
        return response()->json($data);
    }
    function create(Request $request) {
        $model = new Tags();
        $data = $request->all();
        $data['url'] = Transliterate::slugify($request->name);
        $response = $model->create($data);
        return response()->json($response);
    }
    function delete($id) {
        Tags::find($id)->delete();
        return response('ok', 200);
    }
}
