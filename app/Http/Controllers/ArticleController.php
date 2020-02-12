<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{

    protected $articlesStorage = '/img/articles/';

    function get() {
        $data = Article::with('category')->get();
        return response()->json($data);
    }

    function getId($id) {
        $data = Article::with('category', 'comments')->find($id);
        return response()->json($data);
    }

    function create(Request $request) {
        $model = new Article();
        $data = $request->all();
        $name = $this->articlesStorage.uniqid().'.'.$request['img']->getClientOriginalExtension();
        $request['img']->move(public_path().$this->articlesStorage, $name);
        $data['img'] = $name;
        $response = $model->create($data);
        return response()->json($response);
    }

    function edit($id, Request $request) {
        $model = Article::find($id);
        $data = $request->all();

        if($data['img'] != "undefined") {
            $name = $this->articlesStorage.uniqid().'.'.$request['img']->getClientOriginalExtension();
            $request['img']->move(public_path().$this->articlesStorage, $name);
            $data['img'] = $name;
        } else {
            $data['img'] = $model->img;
        }

        $model->update($data);
        return response('ok', 200);
    }

    function delete($id) {
        $data = Article::find($id);
        unlink(public_path($data->img));
        $data->delete();
        return response('ok', 200);
    }
}
