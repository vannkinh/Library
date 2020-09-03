<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

use App\Articles;
use Validator;
// use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $article = Articles::with('user')->get();
        return response()->json($article, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //rule for validating date 
        $rules = [
            'user_id' => 'required|min:1',
            'title' => 'required|min:5|max:50',
            'excerpt' => 'required|min:5',
            'body' => 'required|min:5',
            'created_at'=> 'required|min:5',
            'updated_at' => 'required|min:5',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $article = Articles::create($request ->all());
        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articles::with('user')->find($id);
        if(is_null($article)){
            return response()->json(["message" => "Article not found!"], 404);
        }
        return response()->json($article, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Articles::find($id);
        if (is_null($article)){
            return response()->json(["message" => "Article not found!"], 404);
        }
        $article -> update($request->all());
        return response()->json($article,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articles::find($id);
        if(is_null($article)){
            return response()->json(["message" => "Article not found!"], 404);
        }
        $article->delete();
        return response()->json(null,204);
    }
}
