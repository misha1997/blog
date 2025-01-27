<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transliterate;
use App\Categories;
use App\Article;

class CategoriesController extends Controller
{
    function get() {
        $data = Categories::get();
        return response()->json($data);
    }
    function create(Request $request) {
        $model = new Categories();
        $data = $request->all();
        $data['url'] = Transliterate::slugify($request->name);
        $response = $model->create($data);
        return response()->json($response);
    }
    function edit($id, Request $request) {
        $model = Categories::find($id);
        $model->name = $request->name;
        $model->url = Transliterate::slugify($request->name);
        $model->save();
        return response()->json($model);
    }
    function delete($id) {
        Categories::find($id)->delete();
        return response('ok', 200);
    }
    function getCategoryArticle($name) {
        $category = Categories::where('url', $name)->first();
        $data = Article::with('category')->where('category_id', $category->category_id)->get();
        return response()->json($data);
    }
}
