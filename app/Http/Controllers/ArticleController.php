<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\TagPost;
use App\Tags;
use App\Categories;

class ArticleController extends Controller
{

    protected $articlesStorage = '/img/articles/';

    function get() {
        $data = Article::with('category')->get();
        return response()->json($data);
    }

    function getTagArticle($name) {
        $tag = Tags::where('url', $name)->first();
        $posts = TagPost::with('post')->where('tag_id', $tag->tag_id)->get();
        foreach($posts as $key => $value) {
            $posts[$key]->post->category = Categories::find($value->post->category_id);
        }
        return response()->json($posts);
    }

    function getId($id) {
        $data = Article::with('category', 'comments')->find($id);
        $tags = TagPost::with('tag')->where('post_id', $id)->get();
        return response()->json(["data" => $data, "tags" => $tags]);
    }

    function create(Request $request) {
        $model = new Article();
        $data = $request->all();
        $name = $this->articlesStorage.uniqid().'.'.$request['img']->getClientOriginalExtension();
        $request['img']->move(public_path().$this->articlesStorage, $name);
        $data['img'] = $name;
        $response = $model->create($data);
        foreach(json_decode($request->tags) as $key => $tag) {
            $model = new TagPost;
            $model->tag_id = intval($tag->tag_id);
            $model->post_id = $response->post_id;
            $model->save();
        }
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
        foreach(json_decode($request->tags) as $key => $tag) {
            $model = new TagPost;
            $model->tag_id = intval($tag->tag_id);
            $model->post_id = $id;
            $model->save();
        }
        return response('ok', 200);
    }

    function delete($id) {
        $data = Article::find($id);
        unlink(public_path($data->img));
        $data->delete();
        return response('ok', 200);
    }
}
